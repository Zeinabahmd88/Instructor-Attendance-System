<div id="absentDoctorTable" style="display: none;">
    
<table><thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Campus</th>
            <th>Course</th>
            <th>Time</th>  
            <th>Section</th>
            <th>Status</th>
            <th>Date</th>
            <th>Edit</th>        
            <th>Send To School</th>
        </tr>
    </thead>
    <tbody>
        @foreach($absentDoctors as $doctor)
        <tr>
            <td>{{ $doctor->name }}</td>
            <td>{{ $doctor->email }}</td>
            <td>{{ $doctor->campus }}</td>
            <td>{{ $doctor->course }}</td>
            <td>{{ $doctor->time }}</td>
            <td>{{ $doctor->section }}</td>
            <td data-id="{{ $doctor->id }}" class="doctor-status">{{ $doctor->status }}</td>
            <td>{{ $doctor->time }}</td>

            <td> 
                <form action="{{ route('updateStatus') }}" method="POST">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <button type="submit">Edit</button>
                </form>
            </td>
            <td>
                <form action="{{ route('sendAbsentDoctorsToSchools') }}" method="POST" onsubmit="showAlert()">
                    @csrf
                    <button type="submit">Send  to Schools</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<script>
    function showAlert() {
        alert("Absent doctors sent to schools successfully!");
    }
</script>
<style>/* Table style */
/* Table style */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    display: block; /* Add this line */
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
    color: #333;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #ddd;
}

/* Button style */
button {
    background-color: #4CAF50;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

</style>