@php
    // Generate a unique ID for the custom select bar
    $selectBarId = 'select_bar_' . uniqid();
@endphp

<style>

    .select_ulTeam{{$selectBarId}}{{$selectBarId}}{
        z-index: 6;
        margin: 3px;
        width: 100%;
        position: relative;
        user-select: none;
    }

    .select_ulTeam{{$selectBarId}}{{$selectBarId}} .default_optionTeam{{$selectBarId}}{
        background: #fff;
        border-radius: 5px;
        position: relative;
        cursor: pointer;
    }

    .select_ulTeam{{$selectBarId}}{{$selectBarId}} .default_optionTeam{{$selectBarId}} li{
        padding: 8px 20px;
    }

    .select_ulTeam{{$selectBarId}}{{$selectBarId}} .default_optionTeam{{$selectBarId}}:before{
        content: "";
        position: absolute;
        top: 18px;
        right: 18px;
        width: 6px;
        height: 6px;
        border: 2px solid;
        border-color: transparent transparent #555555 #555555;
        transform: rotate(-45deg);
    }

    .select_ulTeam{{$selectBarId}}{{$selectBarId}} .select_ulTeam{{$selectBarId}}{
        position: absolute;
        top: 55px;
        left: 0;
        width: 100%;
        background: #fff;
        border-radius: 5px;
        display: none;
    }

    .select_ulTeam{{$selectBarId}}{{$selectBarId}} .select_ulTeam{{$selectBarId}} li{
        padding: 8px 20px;
        cursor: pointer;
    }

    .select_ulTeam{{$selectBarId}}{{$selectBarId}} .select_ulTeam{{$selectBarId}} li:first-child:hover{
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .select_ulTeam{{$selectBarId}}{{$selectBarId}} .select_ulTeam{{$selectBarId}} li:last-child:hover{
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .select_ulTeam{{$selectBarId}}{{$selectBarId}} .select_ulTeam{{$selectBarId}} li:hover{
        background-color: lightblue;
        color: #FFFFFF;
    }

    .select_ulTeam{{$selectBarId}}{{$selectBarId}} .option{
        display: flex;
        align-items: center;
    }

    .select_ulTeam{{$selectBarId}}{{$selectBarId}} .option .iconTeam{{$selectBarId}}{
        width: 32px;
        height: 32px;
        margin-right: 15px;
    }


    .select_ulTeam{{$selectBarId}}{{$selectBarId}}.active .select_ulTeam{{$selectBarId}}{
        display: block;
    }

    .select_ulTeam{{$selectBarId}}{{$selectBarId}}.active .default_optionTeam{{$selectBarId}}:before{
        top: 25px;
        transform: rotate(-225deg);
    }
</style>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


<select {{$attributes->merge(['class' => 'hidden'])}} >
    <option disabled selected>Select a team</option>
    @foreach($teams as $team)
        <option value="{{$team->id}}">{{ $team->name }}</option>
    @endforeach
</select>


<div class="select_ulTeam{{$selectBarId}}{{$selectBarId}} border-2 border-gray-200 rounded-lg">
    <ul class="default_optionTeam{{$selectBarId}}">
        <li>
            <div class="iconTeam{{$selectBarId}}"></div>
            <p>Select team</p>
        </li>
    </ul>
    <ul class="select_ulTeam{{$selectBarId}} overflow-y-scroll max-h-52">
        @foreach($teams as $team)
            <li>
                <div class="option {{$team->id}}">
                    <div class="iconTeam{{$selectBarId}} justify-center flex items-center"><img width="40" height="40" src="{{asset($team->logo)}}" alt="Team image"></div>
                    <p>{{ucwords($team->name)}}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<script>
    // Function to handle custom dropdown toggle
    function toggleDropdown() {
        const dropdownOptions = document.querySelector('.select_ulTeam{{$selectBarId}}');
        dropdownOptions.classList.toggle('show');
    }

    // Function to handle option selection
    function selectOption(event) {
        const option = event.target.closest('.option');
        if (option) {
            const value = option.classList[1];
            const label = option.querySelector('p').textContent;
            const selectElement = document.getElementById('team_id_home');
            selectElement.value = value;
            document.querySelector('.default_optionTeam{{$selectBarId}} li p').textContent = label;
            toggleDropdown();
        }
    }

    // Event listeners for dropdown interaction
    document.querySelector('.default_optionTeam{{$selectBarId}}').addEventListener('click', toggleDropdown);
    document.querySelector('.select_ulTeam{{$selectBarId}}').addEventListener('click', selectOption);

    // Close the dropdown when clicking outside it
    window.addEventListener('click', function (event) {
        const dropdownContainer = document.querySelector('.select_ulTeam{{$selectBarId}}{{$selectBarId}}');
        if (!dropdownContainer.contains(event.target)) {
            document.querySelector('.select_ulTeam{{$selectBarId}}').classList.remove('show');
        }
    });

    $(document).ready(function(){
        $(".default_optionTeam{{$selectBarId}}").click(function(){
            $(this).parent().toggleClass("active");
        })

        $(".select_ulTeam{{$selectBarId}} li").click(function(){
            var currentele = $(this).html();
            $(".default_optionTeam{{$selectBarId}} li").html(currentele);
            $(this).parents(".select_ulTeam{{$selectBarId}}{{$selectBarId}}").removeClass("active");
        })
    });
</script>
