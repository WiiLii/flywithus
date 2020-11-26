(function($) {

    var footprintIndicator = null;
    var currentFootprint = {
        'planets': 0
    };
    var animateFromFootprint, animateToFootprint;
    var planetSize = 72;

    function setPlanetSize(num) {
        var containerWidth = $(footprintIndicator).innerWidth();
        var occupiedWidth = Math.min(num, 7) * 72 + 100;
        if (occupiedWidth < containerWidth) {
            planetSize = 72;
        } else {
            planetSize = 36;
            occupiedWidth = Math.min(num, 7) * 36 + 100;
        }
        $('.planets', footprintIndicator).css({
            'background-size': planetSize + 'px'
        });
        $('.planets-row', footprintIndicator).css({
            'width': occupiedWidth + 'px'
        });
    }

    function drawFootprintIndicator(footprint) {
        $('.planets', footprintIndicator).stop().css({
            'width': Math.min(footprint['planets'], 7) * planetSize
        });
        updateFootprintFigures(footprint);
    }

    function updateFootprintFigures(footprint) {
        $('.footprint-figure .footprint-number', footprintIndicator).text(footprint['planets'].toFixed(2));
    }
    window.setFootprint = function(newFootprint, animate) {
        if (!footprintIndicator) {
            footprintIndicator = $('.footprint-indicator');
            if (!footprintIndicator)
                return;
        }
        if (animate) {
            $(function() {
                animateFromFootprint = currentFootprint;
                animateToFootprint = newFootprint;
                currentFootprint = newFootprint;
                setPlanetSize(Math.max(animateFromFootprint['planets'], animateToFootprint['planets']));
                var initialWidth = Math.min(animateFromFootprint['planets'], 7) * planetSize;
                var finalWidth = Math.min(animateToFootprint['planets'], 7) * planetSize;
                $('.planets', footprintIndicator).css({
                    'width': initialWidth + 'px'
                }).animate({
                    'width': finalWidth + 'px'
                }, {
                    'duration': 2000,
                    'progress': function(fx, i) {
                        updateFootprintFigures({
                            'planets': animateFromFootprint['planets'] * (1 - i) + animateToFootprint['planets'] * i
                        });
                    }
                });
            });
        } else {
            currentFootprint = newFootprint;
            setPlanetSize(currentFootprint.planets);
            drawFootprintIndicator(currentFootprint);
        }
    };

    $(function() {
        
       
        $(window).resize(function() {
            if (footprintIndicator) {
                setPlanetSize(currentFootprint.planets);
                drawFootprintIndicator(currentFootprint);
            }
        });
    });
})(jQuery);
;