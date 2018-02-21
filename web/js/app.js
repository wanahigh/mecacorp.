var search = instantsearch({
    // Replace with your own values
    appId: 'BR8UC2GLM8',
    apiKey: 'c5a4c9082f831e6b4e7320644bdefe40', // search only API key, no ADMIN key
    indexName: 'Actors',
    urlSync: true,
    searchParameters: {
        hitsPerPage: 10
    }
});

search.addWidget(
    instantsearch.widgets.searchBox({
        container: '#search-input'
    })
);

search.addWidget(
    instantsearch.widgets.hits({
        container: '#hits',
        templates: {
            item: document.getElementById('hit-template').innerHTML,
            empty: "We didn't find any results for the search <em>\"{{query}}\"</em>"
        }
    })
);

search.start();