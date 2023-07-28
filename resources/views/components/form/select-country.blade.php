@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    <option value="" disabled selected>Select a country</option>
</select>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const countryDropdown = document.getElementById("country");
        const oldCountry =countryDropdown.getAttribute('country');
        // Function to fetch the list of countries from a public API (example: RestCountries API)
        async function fetchCountries() {
            try {
                const response = await fetch("https://restcountries.com/v3.1/all");
                const data = await response.json();
                return data;
            } catch (error) {
                console.error("Error fetching countries:", error);
                return [];
            }
        }

        // Function to populate the country dropdown with options
        async function populateCountryDropdown() {
            const countries = await fetchCountries();

            // Sort the countries alphabetically by name
            countries.sort((a, b) => a.name.common.localeCompare(b.name.common));

            // Create option elements for each country and append to the dropdown
            countries.forEach((country) => {
                const option = document.createElement("option");
                option.value = country.name.common; // Use a unique identifier for the value
                option.textContent = country.name.common;
                if(country.name.common === oldCountry)
                    option.selected= true;
                option.classList.add(`flag-icon-${country.cca2.toLowerCase()}`); // Add the flag icon class
                countryDropdown.appendChild(option);
            });
        }

        // Call the function to populate the country dropdown on page load
        populateCountryDropdown();
    });
</script>
