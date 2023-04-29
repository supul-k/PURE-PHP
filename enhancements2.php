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
                        <p>In this example, the JavaScript code defines a `slideIndex` variable to keep track of the current slide, and a `slides` variable to get all the `img` elements inside the `slideshow` div. The `showSlides()` function hides all the slides by setting their `display` property to "none", increments the `slideIndex` variable, and shows the current slide by setting its `display` property to "block". The function then calls itself using `setTimeout()` to change the slide every 3 seconds.
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