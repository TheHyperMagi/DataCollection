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
        handlePageFunction: async ({request,response, $}) => {
            $('.row div').each((index, el) =>{
                const orgList = [];
                //reduce the set of matched elements to the one at the specified index
                href = $(el).find('.icon-box').attr('href');
                title = $(el).find('.entry-title').text();
                
                /*handlePageFunction: async ({request,response, content, $}) => {
                    $('.left-area div').each((index, el) =>{
                        org_href = $(el).find('.entry-title2').attr('href');
                        org_title = $(el).find('.entry-title2').text();
                        org_content = $(el).find('.content').text(); 
                        orgList.push([org_href, org_title, org_content]);
                    });
                    
                });*/
                dataJson.push([href, title]);
            });
            //store data to default dataset
            await Apify.pushData({dataJson});
        },
    });
    //Run the crawler
    await crawler.run();
    console.log('Crawler and Scrape finished.');
});

    
