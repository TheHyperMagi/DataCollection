/*****1. Accept user input && Get the url******/
//const input = await Apify.getInput();
//console.log(input);

const Apify = require('apify');
Apify.main(async()=>{
    
    //2a. create a requestList - list of Urls
    const requestList = await Apify.openRequestList('start-urls',[
            {url: 'https://www.hati.my/organisations/'},
    ]);
    const requestQueue = await Apify.openRequestQueue('some-url');
    const dataJson = [];
    const crawler = new Apify.CheerioCrawler({
        requestList,
        //function called for each url
        handlePageFunction: async ({request,response, content, $}) => {
            $('.row').each((index, el) =>{
                const orgList = [];
                //reduce the set of matched elements to the one at the specified index
                href = $(el).find('a:eq(0)').attr('href');
                title = $(el).find('a:eq(0)').text();
                requestQueue.addRequest({url: href});
                $('.col-12 col-lg-9 order-1 order-lg-1').each((index,el) =>{
                    org_href = $(el).find('a:eq(0)').attr('href');
                    org_title = $(el).find('a:eq(0)').text();
                    org_content = $(el).find('a:eq(0)').content();

                    orgList.push(org_href, org_title, org_content);
                });
                dataJson.push([href, title, orgList]);
            });
            //store data to default dataset
            await Apify.pushData({dataJson});
        },
    });
    //Run the crawler
    await crawler.run();
    console.log('Crawler and Scrape finished.');
});

    