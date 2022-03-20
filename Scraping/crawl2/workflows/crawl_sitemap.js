const Apify = require('apify');

Apify.main(async () => {
    const xmlJson = [];
    const nestedLinks = [];
    const sitemapData = await Apify.openDataset('sitemap-data');
    // Add URLs to a RequestList from a sitemap
    const sources = [{ requestsFromUrl: 'https://www.hati.my/sitemap_index.xml' }];
    const requestList = await Apify.openRequestList('start-urls', sources);
    // Create a crawler that uses Cheerio
    const crawler = new Apify.CheerioCrawler({
        requestList,
        // Function called for each URL
        handlePageFunction: async ({ request }) => {
            xmlJson.push(request.url);
        },
    });

    // Run the crawler
    await crawler.run();
    await sitemapData.pushData({xmlJson});
});