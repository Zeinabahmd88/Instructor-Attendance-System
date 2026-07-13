<div id="presentDoctorTable" style="display: none;">
    
<table>
    <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Campus</th>
                <th>Course</th>
                <th>Time</th>  
                <th>Section</th>
                <th>Status</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($presentDoctors as $doctor)
            <tr>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->campus }}</td>
                <td>{{ $doctor->course }}</td>
                <td>{{ $doctor->time }}</td>
                <td>{{ $doctor->section }}</td>
                <td>{{ $doctor->status }}</td>
                <td>{{ $doctor->time }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
</div>