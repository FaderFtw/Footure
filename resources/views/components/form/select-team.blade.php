<style>

    .select_wrapTeam{
        z-index: 6;
        margin: 3px;
        width: 100%;
        position: relative;
        user-select: none;
    }

    .select_wrapTeam .default_option{
        background: #fff;
        border-radius: 5px;
        position: relative;
        cursor: pointer;
    }

    .select_wrapTeam .default_option li{
        padding: 8px 20px;
    }

    .select_wrapTeam .default_option:before{
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

    .select_wrapTeam .select_ul{
        position: absolute;
        top: 55px;
        left: 0;
        width: 100%;
        background: #fff;
        border-radius: 5px;
        display: none;
    }

    .select_wrapTeam .select_ul li{
        padding: 8px 20px;
        cursor: pointer;
    }

    .select_wrapTeam .select_ul li:first-child:hover{
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .select_wrapTeam .select_ul li:last-child:hover{
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .select_wrapTeam .select_ul li:hover{
        background: #fff4dd;
    }

    .select_wrapTeam .option{
        display: flex;
        align-items: center;
    }

    .select_wrapTeam .option .icon{
        width: 32px;
        height: 32px;
        margin-right: 15px;
    }


    .select_wrapTeam.active .select_ul{
        display: block;
    }

    .select_wrapTeam.active .default_option:before{
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


<div class="select_wrapTeam border-2 border-gray-200 rounded-lg">
    <ul class="default_option">
        <li>
            <div class="icon"></div>
            <p>Select team</p>
        </li>
    </ul>
    <ul class="select_ul overflow-y-scroll max-h-52">
        @foreach($teams as $team)
            <li>
                <div class="option {{$team->id}}">
                    <div class="icon justify-center flex items-center"><img width="40" height="40" src="{{asset($team->logo)}}" alt="Team image"></div>
                    <p>{{ucwords($team->name)}}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<script>
    // Function to handle custom dropdown toggle
    function toggleDropdown() {
        const dropdownOptions = document.querySelector('.select_ul');
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
            document.querySelector('.default_option li p').textContent = label;
            toggleDropdown();
        }
    }

    // Event listeners for dropdown interaction
    document.querySelector('.default_option').addEventListener('click', toggleDropdown);
    document.querySelector('.select_ul').addEventListener('click', selectOption);

    // Close the dropdown when clicking outside it
    window.addEventListener('click', function (event) {
        const dropdownContainer = document.querySelector('.select_wrapTeam');
        if (!dropdownContainer.contains(event.target)) {
            document.querySelector('.select_ul').classList.remove('show');
        }
    });

    $(document).ready(function(){
        $(".default_option").click(function(){
            $(this).parent().toggleClass("active");
        })

        $(".select_ul li").click(function(){
            var currentele = $(this).html();
            $(".default_option li").html(currentele);
            $(this).parents(".select_wrapTeam").removeClass("active");
        })
    });
</script>
