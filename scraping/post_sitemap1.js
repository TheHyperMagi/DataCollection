const Apify = require('apify');
const {
    data
} = require('cheerio/lib/api/attributes');
const {
    log
} = Apify.utils;

Apify.main(async () => {
    // Add URLs to a RequestList from a sitemap

    const requestList = await new Apify.RequestList({
        sources: [{
            requestsFromUrl: 'https://www.hati.my/post-sitemap1.xml',
            regex: /https:\/\/www\.hati\.my\/.*[^\/<][[^\/<]/gm
        }]
    });

    await requestList.initialize();
    // console.log(requestList.requests[1].url)
    // console.log(requestList.length())

    const crawler = new Apify.CheerioCrawler({
        requestList,
        // maxRequestsPerCrawl: 1,
        handlePageFunction: async ({
            request,
            response,
            body,
            contentType,
            $
        }) => {

            const data = []
            $("div > div > div > div.col-12.col-lg-6.order-1.order-lg-1 > p").each((index, el) => {
                data.push($(el).text())
            });

            const details = [];

            $(".tooltiptext1").each((index, el) => {
                // details.push($(".tooltip1")[index].childNodes[0].innerHTML) // doesn't read attribute links and needs to be added later
                details.push($(".tooltip1")[index].childNodes[0].nodeValue)

                details[index] = [$(el).text(), details[index]]
            })

            await Apify.pushData({
                title: $("img.cat-img").attr("alt"),
                url: request.url,
                description: data,
                social_media: details
            });

        }
    })

    await crawler.run();
})