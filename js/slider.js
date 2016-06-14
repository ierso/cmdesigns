
$('.slider').each(function () { // For every slider
    var $this = $(this); // Current slider
    var $group = $this.find('.slide-group'); // Get the slide-group (container)
    var $slides = $this.find('.slide'); // Create jQuery object to hold all slides
    var currentIndex = 0; // Hold index number of the current slide
    var timeout; // Sets gap between auto-sliding

    $imageButton = $('.image-button');

    // Remove in State after first
    $.each($slides, function (index) {
        $imageButton.eq(index + 1).addClass('inactive');
    });

    function move(newIndex) { // Creates the slide from old to new one
        var animateLeft, slideLeft; // Declare variables

        advance(); // When slide moves, call advance() again

        // If it is the current slide / animating do nothing
        if ($group.is(':animated') || currentIndex === newIndex) {
            return;
        }

        // Add / Remove Active Class
        $imageButton.eq(currentIndex).addClass('inactive');
        $imageButton.eq(newIndex).removeClass('inactive');


        if (newIndex > currentIndex) { // If new item > current
            slideLeft = '100%'; // Sit the new slide to the right
            animateLeft = '-100%'; // Animate the current group to the left
        } else { // Otherwise
            slideLeft = '-100%'; // Sit the new slide to the left
            animateLeft = '100%'; // Animate the current group to the right
        }
        // Position new slide to left (if less) or right (if more) of current
        $slides.eq(newIndex).css({
            left: slideLeft,
            display: 'block'
        });

        $group.animate({
            left: animateLeft
        }, function () { // Animate slides and
            $slides.eq(currentIndex).css({
                display: 'none'
            }); // Hide previous slide
            $slides.eq(newIndex).css({
                left: 0
            }); // Set position of the new item
            $group.css({
                left: 0
            }); // Set position of group of slides
            currentIndex = newIndex; // Set currentIndex to the new image
        });
    }

    function advance() { // Used to set
        clearTimeout(timeout); // Clear previous timeout
        timeout = setTimeout(function () { // Set new timer
            if (currentIndex < ($slides.length - 1)) { // If slide < total slides
                move(currentIndex + 1); // Move to next slide
            } else { // Otherwise
                move(0); // Move to the first slide
            }
        }, 8000); // Milliseconds timer will wait
    }


    // image buttons

    function imgBut() {
        $.each($slides, function (index) {
            $('#image-button-' + (index + 1)).on('click', function () {
                move(index);
            });
        });
    }

    // arrows

    function initArrow() {
        $('#right-arrow').on('click', function () {
            if (currentIndex < ($slides.length - 1)) { // If slide < total slides
                move(currentIndex + 1); // Move to next slide
            } else { // Otherwise
                move(0); // Move to the first slide
            }
        })
        $('#left-arrow').on('click', function () {
            if (currentIndex === 0) { // If slide = first slide
                move(0);
            }else { // Otherwise
                move(currentIndex - 1);
            }
        })
    }

    advance(); // Script is set up, advance() to move it
    imgBut(); // init image buttons
    initArrow();  //init arrows

});
