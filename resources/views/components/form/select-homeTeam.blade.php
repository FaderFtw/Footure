<style>

    .select_wrapHomeTeam{
        z-index: 7;
        margin: 3px;
        width: 100%;
        position: relative;
        user-select: none;
    }

    .select_wrapHomeTeam .default_optionHomeTeam{
        background: #fff;
        border-radius: 5px;
        position: relative;
        cursor: pointer;
    }

    .select_wrapHomeTeam .default_optionHomeTeam li{
        padding: 8px 20px;
    }

    .select_wrapHomeTeam .default_optionHomeTeam:before{
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

    .select_wrapHomeTeam .select_ulHomeTeam{
        position: absolute;
        top: 55px;
        left: 0;
        width: 100%;
        background: #fff;
        border-radius: 5px;
        display: none;
    }

    .select_wrapHomeTeam .select_ulHomeTeam li{
        padding: 8px 20px;
        cursor: pointer;
    }

    .select_wrapHomeTeam .select_ulHomeTeam li:first-child:hover{
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .select_wrapHomeTeam .select_ulHomeTeam li:last-child:hover{
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .select_wrapHomeTeam .select_ulHomeTeam li:hover{
        background-color: lightblue;
        color: #FFFFFF;
    }

    .select_wrapHomeTeam .option{
        display: flex;
        align-items: center;
    }

    .select_wrapHomeTeam .option .iconHomeTeam{
        width: 32px;
        height: 32px;
        margin-right: 15px;
    }

    .select_wrapHomeTeam.active .select_ulHomeTeam{
        display: block;
    }

    .select_wrapHomeTeam.active .default_optionHomeTeam:before{
        top: 25px;
        transform: rotate(-225deg);
    }
</style>

<select {{$attributes->merge(['class' => 'hidden'])}} >
    @if($oldTeam)
        <option disabled >Select a team</option>
        @foreach($teams as $team)
            <option value="{{$team->id}}" {{$oldTeam->id === $team->id ? 'selected' : ''}}>{{ $team->name }}</option>
        @endforeach
    @else
        <option disabled selected>Select a team</option>
        @foreach($teams as $team)
            <option value="{{$team->id}}">{{ $team->name }}</option>
        @endforeach
    @endif

</select>

<div class="select_wrapHomeTeam border-2 border-gray-200 rounded-lg ">
    <ul class="default_optionHomeTeam">
        @if($oldTeam)
            <li>
                <div class="option {{$oldTeam->id}}">
                    <div class="iconHomeTeam justify-center flex items-center"><img width="50" height="50" src="{{asset($oldTeam->logo)}}" alt="Home Team image"></div>
                    <p>{{ucwords($oldTeam->name)}}</p>
                </div>
            </li>
        @else
            <li>
                <div class="iconHomeTeam"></div>
                <p>Select team</p>
            </li>
        @endif
    </ul>
    <ul class="select_ulHomeTeam overflow-y-scroll max-h-52">
        <li>
            <div class="option null">
                <p>Select team</p>
            </div>
        </li>
        @foreach($teams as $team)
            <li>
                <div class="option {{$team->id}}">
                    <div class="iconHomeTeam justify-center flex items-center"><img width="50" height="50" src="{{asset($team->logo)}}" alt="Home Team image"></div>
                    <p>{{ucwords($team->name)}}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<script>
    // Function to handle custom dropdown toggle
    function toggleDropdown() {
        const dropdownOptions = document.querySelector('.select_ulHomeTeam');
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
            document.querySelector('.default_optionHomeTeam li p').textContent = label;
            toggleDropdown();
        }
    }

    // Event listeners for dropdown interaction
    document.querySelector('.default_optionHomeTeam').addEventListener('click', toggleDropdown);
    document.querySelector('.select_ulHomeTeam').addEventListener('click', selectOption);

    // Close the dropdown when clicking outside it
    window.addEventListener('click', function (event) {
        const dropdownContainer = document.querySelector('.select_wrapHomeTeam');
        if (!dropdownContainer.contains(event.target)) {
            document.querySelector('.select_ulHomeTeam').classList.remove('show');
        }
    });

    $(document).ready(function(){
        $(".default_optionHomeTeam").click(function(){
            $(this).parent().toggleClass("active");
        })

        $(".select_ulHomeTeam li").click(function(){
            var currentele = $(this).html();
            $(".default_optionHomeTeam li").html(currentele);
            $(this).parents(".select_wrapHomeTeam").removeClass("active");
        })
    });
</script>
