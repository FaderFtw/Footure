@php
    // Generate a unique ID for the custom select bar
    $selectBarId = 'select_bar_' . uniqid();
@endphp

<style>

    .select_wrap{{$selectBarId}}{
        z-index: 7;
        margin: 3px;
        width: 100%;
        position: relative;
        user-select: none;
    }

    .select_wrap{{$selectBarId}} .default_option{{$selectBarId}}{
        background: #fff;
        border-radius: 5px;
        position: relative;
        cursor: pointer;
    }

    .select_wrap{{$selectBarId}} .default_option{{$selectBarId}} li{
        padding: 8px 20px;
    }

    .select_wrap{{$selectBarId}} .default_option{{$selectBarId}}:before{
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

    .select_wrap{{$selectBarId}} .select_ul{{$selectBarId}}{
        position: absolute;
        top: 55px;
        left: 0;
        width: 100%;
        background: #fff;
        border-radius: 5px;
        display: none;
    }

    .select_wrap{{$selectBarId}} .select_ul{{$selectBarId}} li{
        padding: 8px 20px;
        cursor: pointer;
    }

    .select_wrap{{$selectBarId}} .select_ul{{$selectBarId}} li:first-child:hover{
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .select_wrap{{$selectBarId}} .select_ul{{$selectBarId}} li:last-child:hover{
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .select_wrap{{$selectBarId}} .select_ul{{$selectBarId}} li:hover{
        background-color: lightblue;
        color: #FFFFFF;
    }

    .select_wrap{{$selectBarId}} .option{
        display: flex;
        align-items: center;
    }

    .select_wrap{{$selectBarId}} .option .icon{
        width: 32px;
        height: 32px;
        margin-right: 15px;
    }

    .select_wrap{{$selectBarId}}.active .select_ul{{$selectBarId}}{
        display: block;
    }

    .select_wrap{{$selectBarId}}.active .default_option{{$selectBarId}}:before{
        top: 25px;
        transform: rotate(-225deg);
    }
</style>

<select {{$attributes->merge(['class' => 'hidden'])}} >
    <option disabled selected>Select a team</option>
    @foreach($teams as $team)
        <option value="{{$team->id}}">{{ $team->name }}</option>
    @endforeach
</select>

<div class="select_wrap{{$selectBarId}} border-2 border-gray-200 rounded-lg ">
    <ul class="default_option{{$selectBarId}}">
        <li>
            <div class="icon"></div>
            <p>Select team</p>
        </li>
    </ul>
    <ul class="select_ul{{$selectBarId}} overflow-y-scroll max-h-52">
        <li>
            <div class="option null">
                <p>Select team</p>
            </div>
        </li>
        @foreach($teams as $team)
            <li>
                <div class="option {{$team->id}}">
                    <div class="icon justify-center flex items-center"><img width="70" height="70" src="{{asset($team->logo)}}" alt="League image"></div>
                    <p>{{ucwords($team->name)}}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<script>

    // Function to handle custom dropdown toggle
    function toggleDropdown() {
        const dropdownOptions = document.querySelector('.select_ul{{$selectBarId}}');
        dropdownOptions.classList.toggle('show');
    }

    // Function to handle option selection
    function selectOption(event) {
        const option = event.target.closest('.option');
        if (option) {
            const value = option.classList[1];
            const label = option.querySelector('p').textContent;
            const selectElement = document.getElementById('{{$id}}');
            selectElement.value = value;
            document.querySelector('.default_option{{$selectBarId}} li p').textContent = label;
            toggleDropdown();
        }
    }

    // Event listeners for dropdown interaction
    document.querySelector('.default_option{{$selectBarId}}').addEventListener('click', toggleDropdown);
    document.querySelector('.select_ul{{$selectBarId}}').addEventListener('click', selectOption);

    // Close the dropdown when clicking outside it
    window.addEventListener('click', function (event) {
        const dropdownContainer = document.querySelector('.select_wrap{{$selectBarId}}');
        if (!dropdownContainer.contains(event.target)) {
            document.querySelector('.select_ul{{$selectBarId}}').classList.remove('show');
        }
    });

    $(document).ready(function(){
        $(".default_option{{$selectBarId}}").click(function(){
            $(this).parent().toggleClass("active");
        })

        $(".select_ul{{$selectBarId}} li").click(function(){
            var currentele = $(this).html();
            $(".default_option{{$selectBarId}} li").html(currentele);
            $(this).parents(".select_wrap{{$selectBarId}}").removeClass("active");
        })
    });
</script>
