require ('select2');


module.exports = function(){

    //console.log('fuck this shit');

    $("#venue_id").select2({
        ajax: {
            url: "/search/venues",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term,
                    page: params.page
                };
            },
            processResults: function (response, params) {
                params.page = params.page || 1;

                 var venues = response.data.map(function(venue){

                    return {
                        id: venue.id,
                        text:venue.name
                    }

                });

                return {
                    results: venues,
                    pagination: {
                        more: (params.page * 30) < response.total
                    }
                };
            },
            cache: true
        },
        minimumInputLength: 1
    });

    $("#band_id").select2({
        ajax: {
            url: "/search/bands",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term,
                    page: params.page
                };
            },
            processResults: function (response, params) {
                params.page = params.page || 1;

                var bands = response.data.map(function(band){

                    return {
                        id: band.id,
                        text:band.name
                    }

                });

                return {
                    results: bands,
                    pagination: {
                        more: (params.page * 30) < response.total
                    }
                };
            },
            cache: true
        },
        minimumInputLength: 1
    });

};


