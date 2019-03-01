        // Edit this file to change counselors around. They all have territories. 
        // Change the name and link and all of the locations for that territory will change.
        // add all your code to this method, as this will ensure that page is loaded
        AmCharts.ready(function() {
            // create AmMap object
            var map = new AmCharts.AmMap();

            // Counselors and Links
            // Counselor Territory 1
            var counselorT1 = "Emily Ingemann";
            var territory1 = counselorT1.link("http://www.ripon.edu/ingemanne");
            // Counselor Territory 2
            var counselorT2 = "Sarah Quella";
            var territory2 = counselorT2.link("http://www.ripon.edu/quellas");
            // Counselor Territory 3
            var counselorT3 = "Eliza Stephenson";
            var territory3 = counselorT3.link("http://www.ripon.edu/stephensone");
            // Counselor Territory 4
            var counselorT4 = "John Huegel";
            var territory4 = counselorT4.link("http://www.ripon.edu/huegelj");
            // Counselor Territory 5
            var counselorT5 = "John Ingemann";
            var territory5 = counselorT5.link("http://www.ripon.edu/ingemannj");
            // Counselor Territory 7
            var counselorT7 = "Lyn McCarthy";
            var territory7 = counselorT7.link("http://www.ripon.edu/mccarthyl");
            // Counselor Territory 8
            var counselorT8 = "Vacant";
            var territory8 = counselorT8.link("http://www.ripon.edu/");
            // Counselor Territory 9
            var counselorT9 = "Jennifer Machacek";
            var territory9 = counselorT9.link("http://www.ripon.edu/machacekj");
            // Counselor Territory 10
            var counselorT10 = "Leigh Mlodzik";
            var territory10 = counselorT10.link("http://www.ripon.edu/mlodzikl");
            // Counselor Territory 11
            var counselorT11 = "Hannah Erdman";
            var territory11 = counselorT11.link("http://www.ripon.edu/erdmanh");
            // Counselor Territory 12
            var counselorT12 = "Maddie Vandenhouten";
            var territory12 = counselorT12.link("http://www.ripon.edu/vandenhoutenm");
            // Counselor Territory 13
            var counselorT13 = "Jill Cardinal";
            var territory13 = counselorT13.link("http://www.ripon.edu/cardinalj");

            // set path to images
            map.pathToImages = "/wp-content/themes/ripon/img/map/";

            /* create data provider object
             map property is usually the same as the name of the map file.

             getAreasFromMap indicates that amMap should read all the areas available
             in the map data and treat them as they are included in your data provider.
             in case you don't set it to true, all the areas except listed in data
             provider will be treated as unlisted.
            */
            /*var dataProvider = {
                map: "usaLow",
                getAreasFromMap:true                    
            };*/
                var dataProvider = {
                    mapVar: AmCharts.maps.usaLow,

                    areas: [
                        {
                            id: "US-AL",
                            info: "Counselor: " + territory4
                        },
                        {
                            id: "US-AK",
                            info: "Counselor: " + territory2
                        },
                        {
                            id: "US-AZ",
                            info: "Counselor: " + territory3
                        },
                        {
                            id: "US-AR",
                            info: "Counselor: " + territory4
                        },
                        {
                            id: "US-CA",
                            info: "Counselor: " + territory1
                        },
                        {
                            id: "US-CO",
                            info: "Counselor: " + territory3
                        },
                        {
                            id: "US-CT",
                            info: "Counselor: " + territory5
                        },
                        {
                            id: "US-DE",
                            info: "Counselor: " + territory7
                        },
                        {
                            id: "US-FL",
                            info: "Counselor: " + territory4
                        },
                        {
                            id: "US-GA",
                            info: "Counselor: " + territory4
                        },
                        {
                            id: "US-HI",
                            info: "Counselor: " + territory9
                        },
                        {
                            id: "US-ID",
                            info: "Counselor: " + territory2
                        },
                        {
                            id: "US-IL",
                            info: "North: " + territory4 + "<br>Central and South:" + territory2
                        },
                        {
                            id: "US-IN",
                            info: "Counselor: " + territory13
                        },
                        {
                            id: "US-IA",
                            info: "Counselor: " + territory1
                        },
                        {
                            id: "US-KS",
                            info: "Counselor: " + territory1
                        },
                        {
                            id: "US-KY",
                            info: "Counselor: " + territory4
                        },
                        {
                            id: "US-LA",
                            info: "Counselor: " + territory4
                        },
                        {
                            id: "US-ME",
                            info: "Counselor: " + territory5
                        },
                        {
                            id: "US-MD",
                            info: "Counselor: " + territory7
                        },
                        {
                            id: "US-MA",
                            info: "Counselor: " + territory5
                        },
                        {
                            id: "US-MI",
                            info: "Upper: " + territory11 + "<br>Lower: " + territory11
                        },
                        {
                            id: "US-MN",
                            info: "Counselor: " + territory5
                        },
                        {
                            id: "US-MS",
                            info: "Counselor: " + territory4
                        },
                        {
                            id: "US-MO",
                            info: "Counselor: " + territory1
                        },
                        {
                            id: "US-MT",
                            info: "Counselor: " + territory2
                        },
                        {
                            id: "US-NE",
                            info: "Counselor: " + territory1
                        },
                        {
                            id: "US-NV",
                            info: "Counselor: " + territory3
                        },
                        {
                            id: "US-NH",
                            info: "Counselor: " + territory5
                        },
                        {
                            id: "US-NJ",
                            info: "Counselor: " + territory7
                        },
                        {
                            id: "US-NM",
                            info: "Counselor: " + territory3
                        },
                        {
                            id: "US-NY",
                            info: "Counselor: " + territory5
                        },
                        {
                            id: "US-NC",
                            info: "Counselor: " + territory7
                        },
                        {
                            id: "US-ND",
                            info: "Counselor: " + territory1
                        },
                        {
                            id: "US-OH",
                            info: "Counselor: " + territory13
                        },
                        {
                            id: "US-OK",
                            info: "Counselor: " + territory4
                        },
                        {
                            id: "US-OR",
                            info: "Counselor: " + territory2
                        },
                        {
                            id: "US-PA",
                            info: "Counselor: " + territory5
                        },
                        {
                            id: "US-RI",
                            info: "Counselor: " + territory5
                        },
                        {
                            id: "US-SC",
                            info: "Counselor: " + territory7
                        },
                        {
                            id: "US-SD",
                            info: "Counselor: " + territory1
                        },
                        {
                            id: "US-TN",
                            info: "Counselor: " + territory4
                        },
                        {
                            id: "US-TX",
                            info: "Counselor: " + territory4
                        },
                        {
                            id: "US-UT",
                            info: "Counselor: " + territory3
                        },
                        {
                            id: "US-VT",
                            info: "Counselor: " + territory5
                        },
                        {
                            id: "US-VA",
                            info: "Counselor: " + territory7
                        },
                        {
                            id: "US-WA",
                            info: "Counselor: " + territory2
                        },
                        {
                            id: "US-WV",
                            info: "Counselor: " + territory4
                        },
                        {
                            id: "US-WI",
                            info: "North: " + territory3 + "<br>North East: " + territory12 + "<br>North West: " + territory12 + "<br>Central: " + territory10 + "<br>South East: " + territory7 + "<br>South West: " + territory1
                        },
                        {
                            id: "US-WY",
                            info: "Counselor: " + territory2
                        }
                    ]
                }; 

            // pass data provider to the map object
            map.dataProvider = dataProvider;

            /* create areas settings
             * autoZoom set to true means that the map will zoom-in when clicked on the area
             * selectedColor indicates color of the clicked area.
             */
            map.areasSettings = {
                autoZoom: true,
                selectedColor: "#b30d34"
            };

            // let's say we want a small map to be displayed, so let's create it
            //map.smallMap = new AmCharts.SmallMap();

            // write the map to container div
            map.write("map-counselor");
            map.addListener("clickMapObject", function (event) {
                document.getElementById("map-info").innerHTML = '<h4><b>' + event.mapObject.title + '</b></h4><p>' + event.mapObject.info + '</p>';
            });
        });