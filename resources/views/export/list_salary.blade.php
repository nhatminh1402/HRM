<table class="table table-hover">
    <thead>
        <tr>
            <th style="text-align:center; width: 50px; background-color:#9BBB59">STT</th>
            <th style="text-align:center; width: 100px; background-color:#9BBB59">Mã lương</th>
            <th style="text-align:center; width: 100px; background-color:#9BBB59">Tên Nhân viên</th>
            <th style="text-align:center; width: 200px; background-color:#9BBB59">Chức vụ</th>
            <th style="text-align:center; width: 200px; background-color:#9BBB59">Lương tháng</th>
            <th style="text-align:center; width: 200px; background-color:#9BBB59">Ngày công</th>
            <th style="text-align:center; width: 200px; background-color:#9BBB59">Thục lãnh</th>
            <th style="text-align:center; width: 200px; background-color:#9BBB59">Ngày chấm</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($salaries as $key => $salary)
            <tr>
                <td style="text-align: center">{{ $key + 1 }}</td>
                <td style="text-align: center">{{ $salary->code_salary }}</td>
                <td style="text-align: center">{{ $salary->employee->full_name }}</td>
                <td style="text-align: center">{{ $salary->employee->position->name }}</td>
                <td style="text-align: center">
                    {{ number_format($salary->monthly_salary, 0, '', ',') . ' VNĐ' }}</td>
                <td style="text-align: center">{{ $salary->workday }}</td>
                <td style="text-align: center">
                    {{ number_format($salary->real_leaders, 0, '', ',') . ' VNĐ' }}</td>
                <td style="text-align: center">{{ date_format($salary->created_at, 'H:i:s d-m-Y') }}</td>
                <td style="text-align: center">
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
