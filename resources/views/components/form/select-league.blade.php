<style>

    .select_wrap{
        z-index: 7;
        margin: 3px;
        width: 100%;
        position: relative;
        user-select: none;
    }

    .select_wrap .default_option{
        background: #fff;
        border-radius: 5px;
        position: relative;
        cursor: pointer;
    }

    .select_wrap .default_option li{
        padding: 8px 20px;
    }

    .select_wrap .default_option:before{
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

    .select_wrap .select_ul{
        position: absolute;
        top: 55px;
        left: 0;
        width: 100%;
        background: #fff;
        border-radius: 5px;
        display: none;
    }

    .select_wrap .select_ul li{
        padding: 8px 20px;
        cursor: pointer;
    }

    .select_wrap .select_ul li:first-child:hover{
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .select_wrap .select_ul li:last-child:hover{
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .select_wrap .select_ul li:hover{
        background: #fff4dd;
    }

    .select_wrap .option{
        display: flex;
        align-items: center;
    }

    .select_wrap .option .icon{
        width: 32px;
        height: 32px;
        margin-right: 15px;
    }

    .select_wrap.active .select_ul{
        display: block;
    }

    .select_wrap.active .default_option:before{
        top: 25px;
        transform: rotate(-225deg);
    }
</style>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<select {{$attributes->merge(['class' => 'hidden'])}} >
    <option disabled selected>Select a league</option>
    @foreach($leagues as $league)
        <option value="{{$league->id}}">{{ $league->name }}</option>
    @endforeach
</select>



<div class="select_wrap border-2 border-gray-200 rounded-lg ">
    <ul class="default_option">
        <li>
            <div class="icon"></div>
            <p>Select league</p>
        </li>
    </ul>
    <ul class="select_ul overflow-y-scroll max-h-52">
        @foreach($leagues as $league)
            <li>
                <div class="option {{$league->id}}">
                    <div class="icon justify-center flex items-center"><img width="20" height="20" src="{{asset($league->logo)}}" alt="League image"></div>
                    <p>{{ucwords($league->name)}}</p>
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
            const selectElement = document.getElementById('league_id');
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
        const dropdownContainer = document.querySelector('.select_wrap');
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
            $(this).parents(".select_wrap").removeClass("active");
        })
    });
</script>
