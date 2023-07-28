<div {{$attributes->merge(['class' => 'wrapper h-1/4'])}}>
    <header>
        <p class="current-date"></p>
        <div class="icons">
            <span id="prev" class="material-symbols-rounded">chevron_left</span>
            <span id="next" class="material-symbols-rounded">chevron_right</span>
        </div>
    </header>
    <div class="calendar">
        <ul class="weeks">
            <li>Sun</li>
            <li>Mon</li>
            <li>Tue</li>
            <li>Wed</li>
            <li>Thu</li>
            <li>Fri</li>
            <li>Sat</li>
        </ul>
        <ul class="days" id="days-list"></ul>
    </div>
</div>
<script>
    const daysTag = document.querySelector(".days"),
        currentDate = document.querySelector(".current-date"),
        prevNextIcon = document.querySelectorAll(".icons span");

    // getting new date, current year and month
    let date = new Date(),
        currYear = date.getFullYear(),
        currMonth = date.getMonth();

    // storing full name of all months in array
    const months = ["January", "February", "March", "April", "May", "June", "July",
        "August", "September", "October", "November", "December"];

    const renderCalendar = () => {
        let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(),
            lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(),
            lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(),
            lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();
        let liTag = "";
        const daysList = document.getElementById("days-list");

        for (let i = firstDayofMonth; i > 0; i--) {
            const prevMonthDate = `${currYear}-${(currMonth < 10 ? '0' : '')}${currMonth}-${lastDateofLastMonth - i + 1}`;
            liTag += `<li class="inactive"><a href="/matches/${prevMonthDate}" data-date="${prevMonthDate}">${lastDateofLastMonth - i + 1}</a></li>`;
        }

        for (let i = 1; i <= lastDateofMonth; i++) {
            const currentDate = `${currYear}-${(currMonth + 1 < 10 ? '0' : '')}${currMonth + 1}-${(i < 10 ? '0' : '')}${i}`;
            const parts = window.location.href.split('/');
            let isTheDay = currentDate === parts[parts.length - 1] ? "active" : "";
            let isToday = currentDate === new Date().toISOString().slice(0, 10) ? "font-bold text-green-300" : "";
            liTag += `<li class="${isTheDay}"><a href="/matches/${currentDate}" class="${isToday}" data-date="${currentDate}">${i}</a></li>`;
        }

        for (let i = lastDayofMonth; i < 6; i++) {
            const nextMonthDate = `${currYear}-${(currMonth + 2 < 10 ? '0' : '')}${currMonth + 2}-${i - lastDayofMonth + 1}`;
            liTag += `<li class="inactive"><a href="/matches/${nextMonthDate}" data-date="${nextMonthDate}">${i - lastDayofMonth + 1}</a></li>`;
        }

        currentDate.innerText = `${months[currMonth]} ${currYear}`;
        daysList.innerHTML = liTag;
    }
    renderCalendar();

    prevNextIcon.forEach(icon => { // getting prev and next icons
        icon.addEventListener("click", () => { // adding click event on both icons
            // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
            currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

            if (currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
                // creating a new date of current year & month and pass it as date value
                date = new Date(currYear, currMonth, new Date().getDate());
                currYear = date.getFullYear(); // updating current year with new date year
                currMonth = date.getMonth(); // updating current month with new date month
            } else {
                date = new Date(); // pass the current date as date value
            }
            renderCalendar(); // calling renderCalendar function
        });
    });

    // Add click event listener to anchor tags
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll(".days li a").forEach((anchor) => {
            anchor.addEventListener("click", (event) => {
                event.preventDefault(); // Prevent default link behavior

                // Get the date from the data-date attribute of the clicked anchor
                const clickedDate = anchor.dataset.date;

                // Remove the "active" class from all other li elements and add it to the clicked one
                document.querySelectorAll(".days li").forEach((li) => {
                    li.classList.remove("active");
                });
                anchor.parentElement.classList.add("active");

                // Redirect to the "matches" route with the clicked date
                window.location.href = `/matches/${clickedDate}`;

            });
        });
    });
</script>




