# -*- coding: utf-8 -*-
#pip install openai -q
#pip install chromadb -q
#pip install sentence-transformers -q
#pip install openai==0.27.8 -q
#pip install chromadb==0.3.2 -q
#pip install sentence-transformers==2.2.2 -q

# import packages
#from sentence_transformers import SentenceTransformer,util
from sentence_transformers import SentenceTransformer
from sklearn.metrics.pairwise import cosine_similarity
import os
import numpy as np
import pandas as pd
import openai
import chromadb
from chromadb.config import Settings
import datetime
import random
import sys
#from typing import Union, Sequence, Optional, List, Dict

# Inisialisasi model SentenceTransformer
#model_for_database = SentenceTransformer('all-MiniLM-L6-v2') # 384 dimensional
#model_for_database = SentenceTransformer('distilbert-base-nli-mean-tokens') # 384 dimensional
model_for_intent = SentenceTransformer('distilbert-base-nli-mean-tokens') # 768 dimensional

# OpenAI API Key
openai.api_key="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"

"""# Load Chroma Vector Database"""

# Initialize a client object
client = chromadb.Client(Settings(
    chroma_db_impl="duckdb+parquet",
    persist_directory="C:/xampp/htdocs/RE-SEARCHER/data/researcher_vector_db" # Optional, defaults to .chromadb/ in the current directory
))

# list all collections
#client.list_collections()

# Retrieve the existing collection
unklab_collection = client.get_collection(name="unklab_collection")
intent_collection = client.get_collection(name="intent_collection")

"""###OpenAI Default Prompt (Header Prompt)
Jawab pertanyaan sejujur ​​mungkin menggunakan konteks yang disediakan, dan jika jawabannya tidak terdapat dalam teks data dibawah ini maka dijawab dengan 'Maaf, saya tidak cukup konteks untuk menjawab pertanyaan.'."
    return header + "\n\nData Context:\n" + context + "\n\nPertanyaan yang harus dijawab:\n" + query + "\n"
"""

# Fungsi untuk mengenali intent
def recognize_intent(db_collection, user_query):
    # db query
    results = db_collection.query( query_texts=[user_query], n_results=5)
    # extract output
    recognized_documents = results['documents'][0] # Documents = ['siapa rektor unklab?', '..........
    recognized_source = results['metadatas'][0] # Source = [{'source': 'general'}, {'source': 'general'}, .........
    recognized_distance = results['distances'][0] # Distance = [0.17240433394908905, 0.21593567728996277, 0.376...........
    # Konversi teks intent menjadi vektor fitur
    intent_vectors = model_for_intent.encode(recognized_documents)
    # Konversi teks masukan menjadi vektor fitur
    user_vector = model_for_intent.encode([user_query])
    # calculate skor kemiripan menggunakan cosine_similarity
    similarities = cosine_similarity(user_vector, intent_vectors)
    #print(similarities);
    # get indeks intent dengan skor kemiripan tertinggi
    max_index = np.argmax(similarities)
    # get skor kemiripan maksimum
    max_score = similarities[0][max_index]
    # get intent
    recognized_intent = recognized_source[max_index]['source']
    return recognized_intent, max_score

# query to chromadb
def user_query_chromadb(input_query, input_target_source, input_k):
    # perform query
    results = unklab_collection.query(
      query_texts=[input_query],
      n_results=input_k,
      where={"source": input_target_source},
      # where_document={"$contains":"reptiles"}
    )
    # get dokuments and metadatas
    documents_list = [doc for sublist in results['documents'] for doc in sublist]
    metadatas_list = [doc for sublist in results['metadatas'] for doc in sublist]
    return metadatas_list, documents_list;

# query to chromadb
def user_query_chromadb_default(input_query, input_k):
    # perform query
    results = unklab_collection.query(
      query_texts=[input_query],
      n_results=input_k,
      #where={"source": input_target_source},
      # where_document={"$contains":"reptiles"}
    )
    # get dokuments and metadatas
    documents_list = [doc for sublist in results['documents'] for doc in sublist]
    metadatas_list = [doc for sublist in results['metadatas'] for doc in sublist]
    return metadatas_list, documents_list;

# create prompt openai
def create_openai_prompt(context, query):
    query = query.replace('topik', 'topik research project')
    header = "Berikan rekomendasi sejujur ​​mungkin menggunakan konteks yang disediakan, jawab dengan halus, dan jika jawabannya tidak terdapat dalam teks data dibawah ini maka dijawab dengan 'Maaf, saya tidak punya cukup konteks untuk menjawab pertanyaan tersebut.'. Sesuaikan penggunaan bahasa pada saat menjawab. Jika pertanyaan dalam bahasa indonesia, dijawab dengan bahasa indonesia. Jika pertanyaan dalam bahasa inggris, dijawab dengan bahasa inggris."
    return header + "\n\nData Context:\n" + context + "\n\nRekomendasi yang harus diberikan:\n" + query + "\n"

# generate answer from gpt-3
def genereate_gpt_answer(prompt):
    response = openai.Completion.create(
      model="gpt-3.5-turbo-instruct",
      #model="gpt-3.5-turbo",
      prompt=prompt,
      temperature=0,
      max_tokens=256,
      top_p=1,
      frequency_penalty=0,
      presence_penalty=0,
      stop = [' END']
    )
    return (response.choices[0].text).strip()

# run unklabot
def run_unklabot(input_query, source):
    # semantic search
    docs, result = user_query_chromadb(input_query, source, 3) # default 3
    # create prompt by context
    context= "\n\n".join(result)
    prompt = create_openai_prompt(context, input_query)
    # generate gpt-3 answer
    reply = genereate_gpt_answer(prompt)
    return reply;

# run unklabot
def run_unklabot_default(input_query):
    # semantic search
    docs, result = user_query_chromadb_default(input_query, 5)  # default 5
    # create prompt by context
    context= "\n\n".join(result)
    prompt = create_openai_prompt(context, input_query)
    # generate gpt-3 answer
    reply = genereate_gpt_answer(prompt)
    return reply;

# Test query
#docs, result = user_query_chromadb("siapa Wakil Rektor di Universitas klabat", "fakultas_ilmu_komputer.txt", 2)
#result

#query = "what can a student the Informatics Study Program work as?"
#docs, res = user_query_chromadb(query, "fakultas_ilmu_komputer.txt", 2)

"""### **MANAGE SYSTEM RESPONSE (RE.SEARCHER 1.0)**"""

def ask_unklabot(query):
    # intent recognition
    pred_intent, sim_score = recognize_intent(intent_collection, query)
    #print(f"Recognized intent: '{pred_intent}'\tScore: {sim_score}")

    # temp storage
    answer = "EMPTY";
    threshold = 0.85;

    if sim_score > threshold:
      if pred_intent == "time":
          sekarang = datetime.datetime.now()
          jam_format_12 = sekarang.strftime("%I:%M %p")
          answer = "Sekarang sudah jam "+jam_format_12;

      if pred_intent == "date":
          sekarang = datetime.datetime.now()
          answer = "Tanggal/date = "+sekarang.strftime("%A")+", "+sekarang.strftime("%d %B %Y");

      if pred_intent == "name":
          lst_answer = ["Saya adalah Unklabot, sebuah model bahasa dari penerapan OpenAI GPT-3.", "Saya adalah Unklabot untuk sistem informasi di Universitas Klabat.", "Mereka memanggil saya Unklabot.", "Unklabot, saya pikir itu nama yang keren."]
          answer = random.choice(lst_answer)

      if pred_intent == "hobby":
          lst_answer = ["Sebagai model bahasa AI, saya tidak memiliki kepentingan pribadi, perasaan, atau hobi seperti manusia.", "Saya suka menjawab pertanyaan kamu !", "Saya rasa tidak punya hobby.", "Senang rasanya jika bisa jalan-jalan."]
          answer = random.choice(lst_answer)

      if pred_intent == "human":
          lst_answer = ["Saya adalah sebuah model bahasa AI dan bukan manusia.", "Saya adalah komputer program untuk QnA, bukan manusia.", "saya bukan manusia, saya tidak memiliki kesadaran, emosi, atau identitas manusia.", "Saya bukan manusia, melainkan sebuah program komputer yang menggunakan kecerdasan buatan."]
          answer = random.choice(lst_answer)

      if pred_intent == "general":
          answer = run_unklabot(query, "1_general_unklab_info.txt"); # # not a file, but a filter in chromadb

      if pred_intent == "biaya":
          answer = run_unklabot(query, "2_biaya_kuliah_pemondokan.txt"); # # not a file, but a filter in chromadb

      if pred_intent == "pendaftaran":
          answer = run_unklabot(query, "3_pendaftaran_mahasiswa.txt"); # filter in chromadb

      if pred_intent == "grading":
          answer = run_unklabot(query, "4_grading_system_s1.txt"); # filter in chromadb

      if pred_intent == "sejarah":
          answer = run_unklabot(query, "5_sejarah_unklab.txt"); # filter in chromadb

      if pred_intent == "visimisi":
          answer = run_unklabot(query, "6_visi_misi_tujuan_unklab.txt"); # filter in chromadb

      if pred_intent == "scholarship":
          answer = run_unklabot(query, "7_beasiswa_unklab.txt"); # filter in chromadb

      if pred_intent == "asmi":
          answer = run_unklabot(query, "asmi_klabat.txt"); # filter in chromadb

      if pred_intent == "ekonomi":
          answer = run_unklabot(query, "fakultas_ekonomi_bisnis.txt"); # filter in chromadb

      if pred_intent == "filsafat":
          answer = run_unklabot(query, "fakultas_filsafat.txt"); # filter in chromadb

      if pred_intent == "filkom":
          answer = run_unklabot(query, "fakultas_ilmu_komputer.txt"); # filter in chromadb

      if pred_intent == "fkip":
          answer = run_unklabot(query, "fakultas_keguruan.txt"); # filter in chromadb

      if pred_intent == "fakper":
          answer = run_unklabot(query, "fakultas_pertanian.txt"); # filter in chromadb

      if pred_intent == "fkep":
          answer = run_unklabot(query, "fakultas_keperawatan.txt"); # filter in chromadb

      # Find the best context
      if answer == "Maaf, saya tidak punya cukup konteks untuk menjawab pertanyaan tersebut.":
          answer = run_unklabot_default(query); # without target source in chormadb

      # Final answer using global knowledge from gpt-3
      if answer == "Maaf, saya tidak punya cukup konteks untuk menjawab pertanyaan tersebut." or answer == "EMPTY":
          answer = genereate_gpt_answer(query);

    else:
        answer = genereate_gpt_answer(query);

    # date and time
    time_format_12 = datetime.datetime.now().strftime("%I:%M %p");
    date_format = datetime.datetime.now().strftime("%d %B %Y");
    return {"predicted_intent": pred_intent, "confidence_score": sim_score, "decision_threshold":threshold, "time": time_format_12, "date":date_format, "response": answer}

"""### **TESTING UNKLABOT 1.0**"""
if __name__ == "__main__":
    try:
        # get input argumen
        arg1 = sys.argv[1]  # Argumen pertama
        #arg2 = sys.argv[2]  # Argumen kedua
        
        if len(sys.argv) > 1:
            # Teks input as user query
            uquery = arg1;
        else:
            # Teks input as user query
            uquery = "Hari yang indah.";
            
        # Ask unklabot
        respons = ask_unklabot(uquery);
        
        print(respons);
        
    finally:
        # exit after last line executed
        sys.exit()

