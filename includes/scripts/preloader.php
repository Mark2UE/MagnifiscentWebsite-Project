<script>
    // wait for the page to finish loading
    window.addEventListener("load", function() {
        // get a reference to the preloader or spinner element
        var preloader = document.getElementById("preloader");

        // remove the preloader or spinner from the DOM
        preloader.parentNode.removeChild(preloader);
    });
</script>