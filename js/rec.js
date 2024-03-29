// clean text input
function clean_input(txt_input){
	// remove punctuation
	txt_input = txt_input.replace(/\s+/g, " ");
	txt_input = txt_input.trim();
	
	return txt_input;
}

// user chat replay
function response_user(chat, date){
	var currentDate = new Date();
    var datef = currentDate.toLocaleDateString("en-US", { day: "numeric", month: "short", year: "numeric" });
      
	var html = "<div class='containerbot darker'> <img src='./icons/user.png' alt='Avatar' class='right' style='width:100%;'> <div class='row'> <div class='col-sm-2'><span class='time-left'>"+date+"</br>"+datef+"</span></div> <div class='col-sm-10 text-end'>"+chat+"</div></div></div>";
	return html;
}

// bot chat replay
function response_bot(chat, prob, date){
	var html = "<div class='containerbot'> <img src='./icons/bot.png' alt='Avatar' style='width:100%;'> <div class='row'> <div class='col-sm-10'>"+chat+"</div> <div class='col-sm-2'><span class='time-right'>"+prob+"%</br>"+date+"</span></div> </div> </div>";
	return html;
}

// get time date today
function get_time(date){
	let hours = date.getHours();
	let minutes = date.getMinutes();
	const ampm = hours >= 12 ? 'PM' : 'AM';
	hours = hours % 12;
	hours = hours ? hours : 12; // the hour '0' should be '12'
	hours = hours < 10 ? '0' + hours : hours;
	// appending zero in the start if hours less than 10
	minutes = minutes < 10 ? '0' + minutes : minutes; 
	return hours + ':' + minutes + ' ' + ampm;
}


// compile/execute chatbot
function run_system(){
	// get input chat
	var input_rec = $('#input-rec').val(); 
	
	// clean input chat
	input_rec = clean_input(input_rec);
		
	if(input_rec.length === 0){
        alert("Sorry, write your text chat first.");
    }else{
		
		// Disable input field dan button
		$('#input-rec').val(""); 
		$("#input-rec").prop("disabled", true);
		$("#btn-rec").prop("disabled", true);
		
		// convert teks menjadi huruf kecil
		input_rec = input_rec.toLowerCase();

		// Call ajax
		$.ajax({
			type: "POST",
			url: "run.php",
			data: {"input-rec": input_rec },
			dataType:'text', //or HTML, JSON, etc.
			success: function(response){
				//alert(response);
				console.log(response);
				
				// enable input field dan button
				$("#input-rec").prop("disabled", false);
				$("#btn-rec").prop("disabled", false);
				
				// Mengambil bagian JSON dengan menggunakan regex
				var jsonString = response.match(/\{.*\}/)[0];

				// Mengganti tanda kutip tunggal menjadi ganda untuk memenuhi format JSON
				jsonString = jsonString.replace(/'/g, '"');

				// Parse string JSON menjadi objek JavaScript
				var json_data = JSON.parse(jsonString);

				var res_response = json_data.response;
				var res_threshold = json_data.decision_threshold;
				var res_pred_intent = json_data.predicted_intent;
				var res_confidence = json_data.confidence_score;
				var res_time = json_data.time;
				var res_date = json_data.date;
				//console.log(res_pred_intent);
				//console.log(res_response);
				
				// response chatbot
				const prob_val = (parseFloat(res_confidence)*100).toFixed(2);
				$("#content-rec-feed").append(response_bot(res_response, prob_val, get_time(new Date)));
				force_scroll_bottom();
				
			},
			error: function(xhr, status, error){
				// enable input field dan button
				$("#input-rec").prop("disabled", false);
				$("#btn-rec").prop("disabled", false);
				console.error(xhr);
			}
		});
	}
}

$(document).ready(function(){		
	// assign button click
	$("#btn-rec").click(function(){
		run_system();
		
	});
	
	// assign enter key
	$("#input-rec").on("keydown", function(e) { 
        if(e.keyCode == 13){
            run_system();
		}
    });
});