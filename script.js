document.addEventListener('DOMContentLoaded', function () {
    let homeScore = 0;
    let guestScore = 0;
    let timer;
    let time = 0;

    function updateTimerDisplay() {
        let minutes = Math.floor(time / 60);
        let seconds = time % 60;
        document.getElementById('timer-display').textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    }

    document.getElementById('home-increment').addEventListener('click', function () {
        homeScore++;
        document.getElementById('home-score').textContent = homeScore;
    });

    document.getElementById('home-decrement').addEventListener('click', function () {
        if (homeScore > 0) homeScore--;
        document.getElementById('home-score').textContent = homeScore;
    });

    document.getElementById('guest-increment').addEventListener('click', function () {
        guestScore++;
        document.getElementById('guest-score').textContent = guestScore;
    });

    document.getElementById('guest-decrement').addEventListener('click', function () {
        if (guestScore > 0) guestScore--;
        document.getElementById('guest-score').textContent = guestScore;
    });

    document.getElementById('start-timer').addEventListener('click', function () {
        if (!timer) {
            timer = setInterval(function () {
                time++;
                updateTimerDisplay();
            }, 1000);
        }
    });

    document.getElementById('stop-timer').addEventListener('click', function () {
        clearInterval(timer);
        timer = null;
    });

    document.getElementById('reset-timer').addEventListener('click', function () {
        time = 0;
        updateTimerDisplay();
    });

    updateTimerDisplay();
});