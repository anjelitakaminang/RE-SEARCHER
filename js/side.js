const searchHistory = [
    { query: 'Kucing', date: '2022-03-01' },
    { query: 'Anjing', date: '2022-03-02' },
    { query: 'Burung', date: '2022-03-03' },
];

// Menampilkan history pencarian ke dalam sidebar
const searchHistoryList = document.getElementById('searchHistory');
searchHistory.forEach(item => {
    const listItem = document.createElement('li');
    listItem.textContent = `${item.query} - ${item.date}`;
    searchHistoryList.appendChild(listItem);
});



// Simulasi data history pencarian
let searchHistory = [
    { query: 'Kucing', date: '2022-03-01' },
    { query: 'Anjing', date: '2022-03-02' },
    { query: 'Burung', date: '2022-03-03' },
];

// Menampilkan history pencarian ke dalam sidebar
const searchHistoryList = document.getElementById('searchHistory');
updateSearchHistory();

// Event Listener untuk mengupdate history pencarian
document.addEventListener('search', (event) => {
    const query = event.detail.query;
    const date = event.detail.date;

    // Menambahkan kueri pencarian baru ke dalam history pencarian
    searchHistory.push({ query, date });

    // Mengupdate sidebar dengan history pencarian baru
    updateSearchHistory();
});

function updateSearchHistory() {
    // Mengosongkan daftar history pencarian
    searchHistoryList.innerHTML = '';

    // Menambahkan setiap item history pencarian ke dalam daftar
    searchHistory.forEach(item => {
        const listItem = document.createElement('li');
        listItem.textContent = `${item.query} - ${item.date}`;
        searchHistoryList.appendChild(listItem);
    });
}