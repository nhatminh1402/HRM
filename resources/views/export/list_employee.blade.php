<table>
    <thead>
        <tr>
            <th style="width: 100px; background-color:#9BBB59">MÃ NHÂN VIÊN</th>
            <th style="width: 200px; background-color:#9BBB59">HỌ TÊN</th>
            <th style="width: 70px; background-color:#9BBB59">GIỚI TÍNH</th>
            <th style="width: 200px; background-color:#9BBB59">EMAIL</th>
            <th style="width: 120px; background-color:#9BBB59">SỐ ĐIỆN THOẠI</th>
            <th style="width: 150px; background-color:#9BBB59">CĂN CƯỚC CÔNG DÂN</th>
            <th style="width: 100px; background-color:#9BBB59">NGÀY SINH</th>
            <th style="width: 150px; background-color:#9BBB59">LƯƠNG CƠ BẢN</th>
            <th style="width: 200px; background-color:#9BBB59">ĐỊA CHỈ</th>
            <th style="width: 100px; background-color:#9BBB59">CHỨC VỤ</th>
            <th style="width: 100px; background-color:#9BBB59">PHÒNG BAN</th>
            <th style="width: 100px; background-color:#9BBB59">BẰNG CẤP</th>
            <th style="width: 100px; background-color:#9BBB59">CHUYÊN NGHÀNH</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listEmployee as $employee)
            <tr>
                <td>{{ $employee->code_employee }}</td>
                <td>{{ $employee->full_name }}</td>
                <td>{{ $employee->gender == 1 ? 'Nam' : 'Nữ' }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone_number }}</td>
                <td>{{ $employee->identify_number }}</td>
                <td>{{ $employee->dob }}</td>
                <td>{{ $employee->basic_salary }}</td>
                <td>{{ $employee->province->name }}, {{ $employee->district->name }}, {{ $employee->ward->name }}</td>
                <td>{{ $employee->position->name }}</td>
                <td>{{ $employee->department->name }}</td>
                <td>{{ $employee->degree }}</td>
                <td>{{ $employee->major }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
