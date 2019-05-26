<table id="tech-companies-1" class="table table-striped mb-0">
    <thead>
    <tr>
        <th>ID</th>
        <th data-priority="1">Client</th>
        <th data-priority="3">Weight</th>
        <th data-priority="1">Temperature</th>
        <th data-priority="1">Assigned Doctor</th>
        <th data-priority="1">Status</th>
        <th data-priority="1">Dated</th>
        <th data-priority="3">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $appointment)
        <tr>
            <th>{{$appointment->id}}</th>
            <td><span class="co-name">{{$appointment->client->names}}</span></td>
            <td>{{$appointment->weight}}</td>
            <td>{{$appointment->temperature}}</td>
            <td>{{$appointment->doctor_diagnosis->doctor->name}}</td>
            <td>{{$appointment->decoded_progress}}</td>
            <td>{{$appointment->formatted_date}}</td>
            <td>
                <a href="{{route('check-ins.show', [$appointment->id])}}">
                    <i class="fa fa-eye"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
