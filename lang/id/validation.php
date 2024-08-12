<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'accepted'        => ':Attribute harus diterima.',
    'accepted_if'     => ':Attribute harus diterima ketika :other berisi :value.',
    'active_url'      => ':Attribute bukan URL yang valid.',
    'after'           => ':Attribute harus berisi tanggal setelah :date.',
    'after_or_equal'  => ':Attribute harus berisi tanggal setelah atau sama dengan :date.',
    'alpha'           => ':Attribute hanya boleh berisi huruf.',
    'alpha_dash'      => ':Attribute hanya boleh berisi huruf, angka, strip, dan garis bawah.',
    'alpha_num'       => ':Attribute hanya boleh berisi huruf dan angka.',
    'array'           => ':Attribute harus berisi sebuah array.',
    'attached'        => ':Attribute sudah dilampirkan.',
    'before'          => ':Attribute harus berisi tanggal sebelum :date.',
    'before_or_equal' => ':Attribute harus berisi tanggal sebelum atau sama dengan :date.',
    'between'         => [
        'array'   => ':Attribute harus memiliki :min sampai :max anggota.',
        'file'    => ':Attribute harus berukuran antara :min sampai :max kilobita.',
        'numeric' => ':Attribute harus bernilai antara :min sampai :max.',
        'string'  => ':Attribute harus berisi antara :min sampai :max karakter.',
    ],
    'boolean'           => ':Attribute harus bernilai true atau false',
    'can'               => ':Attribute berisi nilai yang tidak sah.',
    'confirmed'         => ':Attribute tidak cocok.',
    'contains'          => ':Attribute tidak memiliki nilai yang diperlukan.',
    'current_password'  => 'Kata sandi salah.',
    'date'              => ':Attribute bukan tanggal yang valid.',
    'date_equals'       => ':Attribute harus berisi tanggal yang sama dengan :date.',
    'date_format'       => ':Attribute tidak cocok dengan format :format.',
    'decimal'           => 'The :attribute field must have :decimal decimal places.',
    'declined'          => 'The :attribute field must be declined.',
    'declined_if'       => 'The :attribute field must be declined when :other is :value.',
    'different'         => ':Attribute dan :other harus berbeda.',
    'digits'            => ':Attribute harus terdiri dari :digits angka.',
    'digits_between'    => ':Attribute harus terdiri dari :min sampai :max angka.',
    'dimensions'        => ':Attribute tidak memiliki dimensi gambar yang valid.',
    'distinct'          => ':Attribute memiliki nilai yang duplikat.',
    'doesnt_end_with'   => 'The :attribute field must not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute field must not start with one of the following: :values.',
    'email'             => ':Attribute harus berupa alamat surel yang valid.',
    'ends_with'         => ':Attribute harus diakhiri salah satu dari berikut: :values',
    'enum'              => 'The selected :attribute is invalid.',
    'exists'            => ':Attribute yang dipilih tidak valid.',
    'extensions'        => 'The :attribute field must have one of the following extensions: :values.',
    'file'              => ':Attribute harus berupa sebuah berkas.',
    'filled'            => ':Attribute harus memiliki nilai.',
    'gt'                => [
        'array'   => ':Attribute harus memiliki lebih dari :value anggota.',
        'file'    => ':Attribute harus berukuran lebih besar dari :value kilobita.',
        'numeric' => ':Attribute harus bernilai lebih besar dari :value.',
        'string'  => ':Attribute harus berisi lebih besar dari :value karakter.',
    ],
    'gte'                  => [
        'array'   => ':Attribute harus terdiri dari :value anggota atau lebih.',
        'file'    => ':Attribute harus berukuran lebih besar dari atau sama dengan :value kilobita.',
        'numeric' => ':Attribute harus bernilai lebih besar dari atau sama dengan :value.',
        'string'  => ':Attribute harus berisi lebih besar dari atau sama dengan :value karakter.',
    ],
    'hex_color' => 'The :attribute field must be a valid hexadecimal color.',
    'image'     => ':Attribute harus berupa gambar.',
    'in'        => ':Attribute yang dipilih tidak valid.',
    'in_array'  => ':Attribute tidak ada di dalam :other.',
    'integer'   => ':Attribute harus berupa bilangan bulat.',
    'ip'        => ':Attribute harus berupa alamat IP yang valid.',
    'ipv4'      => ':Attribute harus berupa alamat IPv4 yang valid.',
    'ipv6'      => ':Attribute harus berupa alamat IPv6 yang valid.',
    'json'      => ':Attribute harus berupa JSON string yang valid.',
    'list'      => 'The :attribute field must be a list.',
    'lowercase' => 'The :attribute field must be lowercase.',
    'lt'        => [
        'array'   => ':Attribute harus memiliki kurang dari :value anggota.',
        'file'    => ':Attribute harus berukuran kurang dari :value kilobita.',
        'numeric' => ':Attribute harus bernilai kurang dari :value.',
        'string'  => ':Attribute harus berisi kurang dari :value karakter.',
    ],
    'lte'                  => [
        'array'   => ':Attribute harus tidak lebih dari :value anggota.',
        'file'    => ':Attribute harus berukuran kurang dari atau sama dengan :value kilobita.',
        'numeric' => ':Attribute harus bernilai kurang dari atau sama dengan :value.',
        'string'  => ':Attribute harus berisi kurang dari atau sama dengan :value karakter.',
    ],
    'mac_address' => 'The :attribute field must be a valid MAC address.',
    'max'         => [
        'array'   => ':Attribute maksimal terdiri dari :max anggota.',
        'file'    => ':Attribute maksimal berukuran :max kilobita.',
        'numeric' => ':Attribute maksimal bernilai :max.',
        'string'  => ':Attribute maksimal berisi :max karakter.',
    ],
    'max_digits' => 'The :attribute field must not have more than :max digits.',
    'mimes'      => ':Attribute harus berupa berkas berjenis: :values.',
    'mimetypes'  => ':Attribute harus berupa berkas berjenis: :values.',
    'min'        => [
        'array'   => ':Attribute minimal terdiri dari :min anggota.',
        'file'    => ':Attribute minimal berukuran :min kilobita.',
        'numeric' => ':Attribute minimal bernilai :min.',
        'string'  => ':Attribute minimal berisi :min karakter.',
    ],
    'min_digits'       => 'The :attribute field must have at least :min digits.',
    'missing'          => 'The :attribute field must be missing.',
    'missing_if'       => 'The :attribute field must be missing when :other is :value.',
    'missing_unless'   => 'The :attribute field must be missing unless :other is :value.',
    'missing_with'     => 'The :attribute field must be missing when :values is present.',
    'missing_with_all' => 'The :attribute field must be missing when :values are present.',
    'multiple_of'      => ':Attribute harus merupakan kelipatan dari :value',
    'not_in'           => ':Attribute yang dipilih tidak valid.',
    'not_regex'        => 'Format :attribute tidak valid.',
    'numeric'          => ':Attribute harus berupa angka.',
    'password'         => [
        'letters'       => 'The :attribute field must contain at least one letter.',
        'mixed'         => 'The :attribute field must contain at least one uppercase and one lowercase letter.',
        'numbers'       => 'The :attribute field must contain at least one number.',
        'symbols'       => 'The :attribute field must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present'              => ':Attribute tidak boleh ada.',
    'present_if'           => 'The :attribute field must be present when :other is :value.',
    'present_unless'       => 'The :attribute field must be present unless :other is :value.',
    'present_with'         => 'The :attribute field must be present when :values is present.',
    'present_with_all'     => 'The :attribute field must be present when :values are present.',
    'prohibited'           => ':Attribute tidak boleh ada.',
    'prohibited_if'        => ':Attribute tidak boleh ada bila :other adalah :value.',
    'prohibited_unless'    => ':Attribute tidak boleh ada kecuali :other memiliki nilai :values.',
    'prohibits'            => 'The :attribute field prohibits :other from being present.',
    'regex'                => 'Format :attribute tidak valid.',
    'required'             => ':Attribute wajib diisi.',
    'required_array_keys'  => 'The :attribute field must contain entries for: :values.',
    'required_if'          => ':Attribute wajib diisi bila :other adalah :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_if_declined' => 'The :attribute field is required when :other is declined.',
    'required_unless'      => ':Attribute wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'        => ':Attribute wajib diisi bila terdapat :values.',
    'required_with_all'    => ':Attribute wajib diisi bila terdapat :values.',
    'required_without'     => ':Attribute wajib diisi bila tidak terdapat :values.',
    'required_without_all' => ':Attribute wajib diisi bila sama sekali tidak terdapat :values.',
    'same'                 => ':Attribute dan :other harus sama.',
    'size'                 => [
        'array'   => ':Attribute harus mengandung :size anggota.',
        'file'    => ':Attribute harus berukuran :size kilobyte.',
        'numeric' => ':Attribute harus berukuran :size.',
        'string'  => ':Attribute harus berukuran :size karakter.',
    ],
    'starts_with' => ':Attribute harus diawali salah satu dari berikut: :values',
    'string'      => ':Attribute harus berupa string.',
    'timezone'    => ':Attribute harus berisi zona waktu yang valid.',
    'unique'      => ':Attribute sudah ada sebelumnya.',
    'uploaded'    => ':Attribute gagal diunggah.',
    'uppercase'   => ':Attribute harus huruf besar semua.',
    'url'         => 'Format :attribute tidak valid.',
    'ulid'        => ':Attribute harus berupa ULID yang valid',
    'uuid'        => ':Attribute harus merupakan UUID yang valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
