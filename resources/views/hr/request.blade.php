    <div id="requestAbsentDoctorTable" style="display: none;">
    <h1>Absence Requests</h1>
        @if($absenceRequests->isEmpty())
            <p>No absence requests found.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Doctor ID</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($absenceRequests as $request)
                        <tr>
                            <td>{{ $request->doctor->name }}</td>
                            <td>{{ $request->doctor->id }}</td>
                            <td>{{ $request->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
</div>
