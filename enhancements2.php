<?php
include './menu.inc';
?>

<body>
    <article>
        <section id="enhan_list">
            <h1 id="heading1">Enhancement 2</h1>
            <ol>
                <li>Enhancement 1 :
                    <ul>
                        <li>
                            <a href="index.php">Apply slide show to the home page</a>
                        </li>
                        <p>In this example, The  JavaScript code change the image slider by setting a timer to change images every 4 seconds using setInterval(). It also allows manual control of the slider with radio buttons by adding event listeners. The showNextSlide() function gets the next slide index by incrementing the current slide index and then uses the opacity CSS property to hide the current slide and show the next slide. The function also updates the checked state of the radio button corresponding to the next slide. The startImageSlider() function gets the images and radio buttons, sets the current slide index, and calls showNextSlide() to display the first slide.
                        </p>
                    </ul>
                </li>
                <li>Enhancement 2 :
                    <ul>
                        <li>
                            <a href="apply.php">Use JavaScript to change the Menu display, to reflect the current page being viewed</a>
                        </li>
                        <p>In this code, the `window.location.href` property is used to get the current URL of the page. The `getElementsByTagName()` method is used to get all the `a` elements in the menu. A `for` loop is then used to iterate through each `a` element and check if its `href` attribute matches the current URL. If there is a match, the `classList.add()` method is used to add the `active` class to the `a` element.</p>
                    </ul>
                </li>
                <li>Enhancement 3 :
                    <ul>
                        <li>
                            <a href="apply.php">Add timer to fill the form </a>
                        </li>
                        <p>In the `startTimer()` function is defined, which contains the timer code . Here's call the `startTimer()` function from an HTML file and the `onclick` attribute is used to call the `startTimer()` function when the button is clicked
                    </ul>
                </li>

            </ol>
        </section>
    </article>
</body>


<?php
include './footer.inc';
?>