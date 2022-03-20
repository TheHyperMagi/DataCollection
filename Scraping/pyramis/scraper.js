const Apify = require('apify');

const https = require('https')
const wiki = require('wikijs').default

async function wikipedia_html(name) {
    await wiki().page(name)
        .then(page => page.url())
        .then((url) => {
            console.log(url)
        })
        .catch();
};





const requestList = new Apify.RequestList({
    sources: [{
        url: 'https://skoll.org/community/awardees/'
    }]
});

requestList.initialize();

const crawler = new Apify.CheerioCrawler({
    requestList,
    handlePageFunction: async ({
        request,
        response,
        body,
        contentType,
        $
    }) => {
        const data = [];

        $('.box').each((index, el) => {
            // only for skoll
            title = $(el).find('a:eq(0)').text();
            // link = wikipedia_html(title)

            data.push(title)
            // link to skoll profile
            // href= $(el).find('a:eq(0)').attr('href');

        });

        // Save the data to dataset.
        await Apify.pushData({
            html: body,
            data
        });
    },
});

crawler.run();