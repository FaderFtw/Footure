<style>

    .select_wrapAwayTeam{
        z-index: 7;
        margin: 3px;
        width: 100%;
        position: relative;
        user-select: none;
    }

    .select_wrapAwayTeam .default_optionAwayTeam{
        background: #fff;
        border-radius: 5px;
        position: relative;
        cursor: pointer;
    }

    .select_wrapAwayTeam .default_optionAwayTeam li{
        padding: 8px 20px;
    }

    .select_wrapAwayTeam .default_optionAwayTeam:before{
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

    .select_wrapAwayTeam .select_ulAwayTeam{
        position: absolute;
        top: 55px;
        left: 0;
        width: 100%;
        background: #fff;
        border-radius: 5px;
        display: none;
    }

    .select_wrapAwayTeam .select_ulAwayTeam li{
        padding: 8px 20px;
        cursor: pointer;
    }

    .select_wrapAwayTeam .select_ulAwayTeam li:first-child:hover{
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .select_wrapAwayTeam .select_ulAwayTeam li:last-child:hover{
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .select_wrapAwayTeam .select_ulAwayTeam li:hover{
        background-color: lightblue;
        color: #FFFFFF;
    }

    .select_wrapAwayTeam .option{
        display: flex;
        align-items: center;
    }

    .select_wrapAwayTeam .option .iconAwayTeam{
        width: 32px;
        height: 32px;
        margin-right: 15px;
    }

    .select_wrapAwayTeam.active .select_ulAwayTeam{
        display: block;
    }

    .select_wrapAwayTeam.active .default_optionAwayTeam:before{
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

<div class="select_wrapAwayTeam border-2 border-gray-200 rounded-lg ">
    <ul class="default_optionAwayTeam">
        <li>
            <div class="iconAwayTeam"></div>
            <p>Select team</p>
        </li>
    </ul>
    <ul class="select_ulAwayTeam overflow-y-scroll max-h-52">
        <li>
            <div class="option null">
                <p>Select team</p>
            </div>
        </li>
        @foreach($teams as $team)
            <li>
                <div class="option {{$team->id}}">
                    <div class="iconAwayTeam justify-center flex items-center"><img width="50" height="50" src="{{asset($team->logo)}}" alt="Away Team image"></div>
                    <p>{{ucwords($team->name)}}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<script>
    // Function to handle custom dropdown toggle
    function toggleDropdown() {
        const dropdownOptions = document.querySelector('.select_ulAwayTeam');
        dropdownOptions.classList.toggle('show');
    }

    // Function to handle option selection
    function selectOption(event) {
        const option = event.target.closest('.option');
        if (option) {
            const value = option.classList[1];
            const label = option.querySelector('p').textContent;
            const selectElement = document.getElementById('team_id_away');
            selectElement.value = value;
            document.querySelector('.default_optionAwayTeam li p').textContent = label;
            toggleDropdown();
        }
    }

    // Event listeners for dropdown interaction
    document.querySelector('.default_optionAwayTeam').addEventListener('click', toggleDropdown);
    document.querySelector('.select_ulAwayTeam').addEventListener('click', selectOption);

    // Close the dropdown when clicking outside it
    window.addEventListener('click', function (event) {
        const dropdownContainer = document.querySelector('.select_wrapAwayTeam');
        if (!dropdownContainer.contains(event.target)) {
            document.querySelector('.select_ulAwayTeam').classList.remove('show');
        }
    });

    $(document).ready(function(){
        $(".default_optionAwayTeam").click(function(){
            $(this).parent().toggleClass("active");
        })

        $(".select_ulAwayTeam li").click(function(){
            var currentele = $(this).html();
            $(".default_optionAwayTeam li").html(currentele);
            $(this).parents(".select_wrapAwayTeam").removeClass("active");
        })
    });
</script>
