
<div id="absentDoctorTable" style="display: none;">
<h1>Absent Doctors for {{ $school->school_name }}</h1>
@if($absentDoctors->isEmpty())
    <p>No absent doctors found for this school.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Send</th>
                <th>Action</th>
                <th>send if know </th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($absentDoctors as $doctor)
                <tr>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td>
                        <form action="{{ route('request.absent.reason', $doctor->id) }}" method="POST"  onsubmit="showAlert()">
                            @csrf
                            <button type="submit">Request Reason</button>
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('submit.absence.status', $doctor->id) }}" method="POST" onsubmit="showAlert1()">
                            @csrf
                            <select name="status">
                                <option value="Absent">Absent</option>
                                <option value="Present">Present</option>
                            </select>
                    </td>
                    <td>
                        <button type="submit">Submit Status</button>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

</div>