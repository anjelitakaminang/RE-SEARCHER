document.getElementById('recommendation-form').addEventListener('submit', function(event) {
    event.preventDefault();
    var major = document.getElementById('major').value;
    var interest = document.getElementById('interest').value;

    // Perform your recommendation logic here using the 'major' and 'interest' variables
    console.log('Major:', major);
    console.log('Interest:', interest);

    // Example search history
var searchHistory = [
    { major: 'CS', interest: 'Machine Learning' },
    { major: 'ECE', interest: 'Signal Processing' },
    { major: 'ME', interest: 'Robotics' }
];

// Display the search history in the sidebar
var searchHistoryList = document.getElementById('search-history');
searchHistory.forEach(function(search) {
    var listItem = document.createElement('li');
    listItem.textContent = search.major + ' - ' + search.interest;
    searchHistoryList.appendChild(listItem);
});
});


