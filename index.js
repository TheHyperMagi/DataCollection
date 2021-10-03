function requestdata() {
    const url = "https://data.gov.sg/api/action/datastore_search?resource_id=5ab68aac-91f6-4f39-9b21-698610bdf3f7&limit=5&q=jones"
    fetch(url)
        .then(data => data.json())
        .then((json) => {
            var json_result = JSON.stringify(json.result.records, null, ' ')
            console.log(json_result)
            document.getElementById('demo').innerHTML = `"<pre><code> ${json_result} </code></pre>"`;
        })
};

