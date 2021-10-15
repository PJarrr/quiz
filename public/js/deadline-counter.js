console.log("deadline counter on");

console.log("deadline counter onnnnnnnnnnnnnnn");

axios
    .get(timeURL)
    .then(function (response) {
        //
        console.log(response.data);

        let finishTime = new Date(Date.parse(new Date(response.data)));

        console.log(finishTime);

        initializeClock("clockdiv", finishTime);
    })
    .catch(function (error) {
        //console.log(error);
    });

function getTimeRemaining(endtime) {
    let t = Date.parse(endtime) - Date.parse(new Date());
    let seconds = Math.floor((t / 1000) % 60);
    let minutes = Math.floor((t / 1000 / 60) % 60);
    let hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    let days = Math.floor(t / (1000 * 60 * 60 * 24));
    return {
        total: t,
        days: days,
        hours: hours,
        minutes: minutes,
        seconds: seconds,
    };
}

function initializeClock(id, endtime) {
    let clock = document.getElementById(id);
    let daysSpan = clock.querySelector(".days");
    let hoursSpan = clock.querySelector(".hours");
    let minutesSpan = clock.querySelector(".minutes");
    let secondsSpan = clock.querySelector(".seconds");

    function updateClock() {
        let t = getTimeRemaining(endtime);

        daysSpan.innerHTML = t.days;
        hoursSpan.innerHTML = ("0" + t.hours).slice(-2);
        minutesSpan.innerHTML = ("0" + t.minutes).slice(-2);
        secondsSpan.innerHTML = ("0" + t.seconds).slice(-2);

        if (t.total <= 0) {
            clearInterval(timeinterval);
            window.location.replace(
                "http://localhost/quiz/public/game/results/store/" //TODO: this does not  work, need to pass {game} somehow.
            ); //when time ends - >redirects to store result
        }
    }

    updateClock();
    let timeinterval = setInterval(updateClock, 1000);
}
