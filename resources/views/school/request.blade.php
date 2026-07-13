<div id="requestAbsentDoctorTable" style="display: none;">
<h2>Submitted Absence Reasons</h2>
@if($absenceRequests->isEmpty())
    <p>No absence reasons submitted yet.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Doctor Name</th>
                <th>Email</th>
                <th>Reason</th>
                <th>Date Submitted</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absenceRequests as $request)
                <tr>
                    <td>{{ $request->doctor->name }}</td>
                    <td>{{ $request->doctor->email }}</td>
                    <td>{{ $request->reason }}</td>
                    <td>{{ $request->updated_at }}</td>
                    <td>
                        <form action="{{ route('submit.absence.status', $request->id) }}" method="POST" onsubmit="showAlert1()">
                            @csrf
                            <select name="status">
                                <option value="Absent">Absent</option>
                                <option value="Present">Present</option>
                            </select>
                    </td>
                    <td>
                        <button type="submit">Submit Status</button>
                    </form>
                    </td>
                    <td>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
</div>