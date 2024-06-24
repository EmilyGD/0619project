<div id="progress-bar" class="fixed top-0 left-0 z-50 hidden h-1 transition-all bg-black du">
</div>


<script>
    window.addEventListener('load', function() {
        var progressBar = document.getElementById('progress-bar');
        progressBar.style.width = '0%';
        progressBar.classList.remove('hidden');

        var interval = setInterval(function() {
            var width = parseInt(progressBar.style.width);
            if (width < 100) {
                width++;
                progressBar.style.width = width + '%';
            } else {
                clearInterval(interval);
                progressBar.classList.add('hidden');
            }
        }, 10);
    });
</script>
