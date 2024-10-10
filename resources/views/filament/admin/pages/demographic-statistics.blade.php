<x-filament::page>
    <div class="space-y-4">
        <h2 class="text-xl font-bold">Demographic Statistics</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-4 bg-white shadow rounded-lg">
                <h3 class="text-lg font-semibold">Total Population</h3>
                <p>{{ $this->getDemographicData()['total_population'] }}</p>
            </div>

            <div class="p-4 bg-white shadow rounded-lg">
                <h3 class="text-lg font-semibold">Male Count</h3>
                <p>{{ $this->getDemographicData()['male_count'] }}</p>
            </div>

            <div class="p-4 bg-white shadow rounded-lg">
                <h3 class="text-lg font-semibold">Female Count</h3>
                <p>{{ $this->getDemographicData()['female_count'] }}</p>
            </div>

            <div class="p-4 bg-white shadow rounded-lg">
                <h3 class="text-lg font-semibold">Population by Age Groups</h3>
                <ul>
                    @foreach ($this->getDemographicData()['age_groups'] as $ageRange => $count)
                        <li>{{ $ageRange }}: {{ $count }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-filament::page>