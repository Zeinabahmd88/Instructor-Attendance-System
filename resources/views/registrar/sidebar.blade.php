<!DOCTYPE html>
<html>
<head>
    <title>Attendance Form</title>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <span class="toggle-btn" onclick="toggleSidebar()">☰</span>
        <h2>Blocks</h2>
        <ul id="blockList">
            <?php $blocks = []; ?>
            @foreach($data as $doctor)
                @if (!in_array($doctor->block, $blocks))
                    <?php $blocks[] = $doctor->block; ?>
                @endif
            @endforeach
            <?php sort($blocks); ?>
            @foreach($blocks as $block)
                <li><a href="#" onclick="showDoctors('{{ $block }}')">{{ $block }}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="content" id="doctorTableContainer">
        <div class="current-date" id="currentDate"></div>
        <div class="time-filter-container">
            <label for="timeFilter">Time:</label>
            <select id="timeFilter" onchange="filterByTime()">
                <option value="">All</option>
                <?php $times = []; ?>
                @foreach($data as $doctor)
                    @if (!in_array($doctor->time, $times))
                        <?php $times[] = $doctor->time; ?>
                        <option value="{{ $doctor->time }}">{{ $doctor->time }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="floor-filter-container">
            <label for="floorFilter">Floor:</label>
            <select id="floorFilter" onchange="filterBySection()">
                <option value="">All</option>
                <?php $sections = []; ?>
                @foreach($data as $doctor)
                    @if (!in_array($doctor->section, $sections))
                        <?php $sections[] = $doctor->section; ?>
                        <option value="{{ $doctor->section }}">{{ $doctor->section }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <form id="attendanceForm" action="{{ url('store') }}" method="POST">
            @csrf
            <input type="hidden" name="selectedTime" id="selectedTimeInput">
            <table id="doctorTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Campus</th>
                        <th>Course</th>
                        <th>Section</th>
                        <th>Block</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $doctor)
                        <tr class="doctorRow" data-time="{{ $doctor->time }}">
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->email }}</td>
                            <td>{{ $doctor->campus }}</td>
                            <td>{{ $doctor->course }}</td>
                            <td>{{ $doctor->section }}</td>
                            <td>{{ $doctor->block }}</td>
                            <td>{{ $doctor->time }}</td>
                            <input type="hidden" name="attendances[{{ $doctor->id }}][doctor_id]" value="{{ $doctor->id }}">
                            <input type="hidden" name="attendances[{{ $doctor->id }}][name]" value="{{ $doctor->name }}">
                            <input type="hidden" name="attendances[{{ $doctor->id }}][email]" value="{{ $doctor->email }}">
                            <input type="hidden" name="attendances[{{ $doctor->id }}][campus]" value="{{ $doctor->campus }}">
                            <input type="hidden" name="attendances[{{ $doctor->id }}][course]" value="{{ $doctor->course }}">
                            <input type="hidden" name="attendances[{{ $doctor->id }}][section]" value="{{ $doctor->section }}">
                            <input type="hidden" name="attendances[{{ $doctor->id }}][block]" value="{{ $doctor->block }}">
                            <input type="hidden" name="attendances[{{ $doctor->id }}][time]" value="{{ $doctor->time }}">
                            <input type="hidden" name="attendances[{{ $doctor->id }}][school_name]" value="{{ $doctor->school_name }}">
                            <td class="statusCell" id="status_{{ $doctor->id }}">
                                <span>Present</span>
                                <input type="hidden" name="attendances[{{ $doctor->id }}][status]" value="Present">
                            </td>
                            <td class="actionCell">
                                <label class="switch">
                                    <input type="checkbox" checked onclick="toggleStatus('{{ $doctor->id }}', this)">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button class="submit-button" id="submitBtn" type="submit" >Submit Attendance</button>
        </form>
    </div>
   
</body>
</html>
