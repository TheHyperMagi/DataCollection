import Apify from 'apify';
import { readFileSync } from 'fs';
export {scrawler_content};
await Apify.utils.purgeLocalStorage();
/*
const jsonRead = readFileSync("trial01.json", "utf-8");
//console.log(JSON.parse(jsonRead));
const sources = JSON.parse(jsonRead);
*/
function scrawler_content(obj) {
    for (let i in obj) {
        i.concat(",");
    }

    Apify.main(async () => {
        // Add URLs to a RequestList from a sitemap
        const requestList = await Apify.openRequestList('start-urls', obj);
        const crawler = new Apify.CheerioCrawler({
            requestList,
            // maxRequestsPerCrawl: 1,
            handlePageFunction: async ({
                request,
                //response,
                //body,
                //contentType,
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
}