<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	
	public $auth = [
		'username' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Pengguna wajib di isi',
			]
		],
		'password' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Password wajib di isi',
			]
		]
	];

	public $kategori = [
		'kategori_name' => [
			'rules' => 'required|is_unique[kategori.name]',
			'errors' => [
				'required' => 'Kategori wajib di isi',
				'is_unique' => 'nama {value} sudah ada'
			]
		],
	];
	public $jenis = [
		'jenis_name' => [
			'rules' => 'required|is_unique[kategori.name]',
			'errors' => [
				'required' => 'Jenis wajib di isi',
				'is_unique' => 'nama {value} sudah ada'
			]
		],
		'kategori' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Kategori wajib di isi',
			]
		],
	];
	public $produk = [
		'produk' => [
			'rules' => 'required|is_unique[produk.name]',
			'errors' => [
				'required' => 'Produk wajib di isi',
				'is_unique' => 'nama {value} sudah ada'
			]
		],
		'jenis_produk' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Jenis wajib di isi',
			]
		],
	];
	public $reseller = [
		'reseller' => [
			'rules' => 'required|min_length[3]|alpha_space',
			'errors' => [
				'required' => 'Reseller wajib di isi',
				'alpha_space' => 'nama {value} harus berupa alfabetic',
				'min_length' => 'nama {value} minimal 3 huruf'
			]
		],
		'join_date' => [
			'rules' => 'required|valid_date',
			'errors' => [
				'required' => 'Tanggal bergabung wajib di isi',
				'valid_date' => 'Tanggal tidak valid',
			]
		],
	];

	public $transaksiMasuk = [
		'no_po' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Nomor PO wajib di isi'
			],
		],
		'tgl_transaksi' => [
			'rules' => 'required|valid_date',
			'errors' => [
				'required' => 'Tanggal transaksi wajib di isi',
				'valid_date' => 'Tanggal tidak valid',
			],
		],
		'produk' => [
			'rules' => 'required',
			'errors' => [
				'required' => '{field} wajib di isi'
			],
		],
		'warna' => [
			'rules' => 'required|alpha_space',
			'errors' => [
				'required' => '{field} wajib di isi',
				'alpha_space' => '{field} harus berupa alfabetic',
			],
		],
		'size' => [
			'rules' => 'required|decimal',
			'errors' => [
				'required' => '{field} wajib di isi',
			],
		],
		'pembayaran' => [
			'rules' => 'required',
			'errors' => [
				'required' => '{field} wajib di isi',
			],
		],
		'nominal'=> [
			'rules' => 'required|numeric',
			'errors' => [
				'required' => '{param} wajib di isi',
				'numeric' => '{field} harus berupa angka',
			],
		],
	];

	public $transaksiKeluar = [
		'tgl_transaksi' => [
			'rules' => 'required|valid_date',
			'errors' => [
				'required' => 'Tanggal transaksi wajib di isi',
				'valid_date' => 'Tanggal tidak valid',
			],
		],
		'reseller' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Reseller wajib di isi'
			],
		],
		'produk' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Produk wajib di isi'
			],
		],
		'warna' => [
			'rules' => 'regex_match[/^[a-zA-Z\s ]*$/]',
			'errors' => [
				'regex_match' => 'Warna harus berupa alfabetic',
			],
		],
		'qty' => [
			'rules' => 'required|numeric',
			'errors' => [
				'required' => 'Qty wajib di isi',
				'numeric' => 'Size harus berupa angka',
			],
		],
		'size' => [
			'rules' => 'regex_match[/^[0-9 ]*$/]',
			'errors' => [
				'regex_match' => 'Size harus berupa angka',
			],
		],
		'saldo_masuk' => [
			'rules' => 'required|numeric',
			'errors' => [
				'required' => 'Saldo Masuk wajib di isi',
				'numeric' => 'Saldo Masuk harus berupa angka',
			],
		],
		'modal' => [
			'rules' => 'required|numeric',
			'errors' => [
				'required' => 'Modal wajib di isi',
				'numeric' => 'Modal harus berupa angka',
			],
		],
		'garansi' => [
			'rules' => 'required|numeric',
			'errors' => [
				'required' => 'Garansi wajib di isi',
				'numeric' => 'Garansi harus berupa angka',
			],
		],
		'nama_penerima'=> [
			'rules' => 'required|alpha_space',
			'errors' => [
				'required' => 'Nama Penerima wajib di isi',
				'alpha_space' => 'Nama Penerima harus berupa alfabetic',
			],
		],
		'alamat_penerima'=> [
			'rules' => 'required',
			'errors' => [
				'required' => 'Alamat Penerima wajib di isi',
			],
		],
		'pembayaran_pembeli' => [
			'rules' => 'required|numeric',
			'errors' => [
				'required' => 'Pembayaran wajib di isi',
				'numeric' => 'Pembayaran harus berupa angka',
			],
		],
	];

	public $transaksiKeluarUpdate = [
		'tgl_transaksi' => [
			'rules' => 'required|valid_date',
			'errors' => [
				'required' => 'Tanggal transaksi wajib di isi',
				'valid_date' => 'Tanggal tidak valid',
			],
		],
		'reseller' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Reseller wajib di isi'
			],
		],
		'produk' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Produk wajib di isi'
			],
		],
		'warna' => [
			'rules' => 'regex_match[/^[a-zA-Z\s ]*$/]',
			'errors' => [
				'regex_match' => 'Warna harus berupa alfabetic',
			],
		],
		'qty' => [
			'rules' => 'required|numeric',
			'errors' => [
				'required' => 'Qty wajib di isi',
				'numeric' => 'Size harus berupa angka',
			],
		],
		'size' => [
			'rules' => 'regex_match[/^[0-9 ]*$/]',
			'errors' => [
				'regex_match' => 'Size harus berupa angka',
			],
		],
		'saldo_masuk' => [
			'rules' => 'required|numeric',
			'errors' => [
				'required' => 'Saldo Masuk wajib di isi',
				'numeric' => 'Saldo Masuk harus berupa angka',
			],
		],
		'modal' => [
			'rules' => 'required|numeric',
			'errors' => [
				'required' => 'Modal wajib di isi',
				'numeric' => 'Modal harus berupa angka',
			],
		],
		'garansi' => [
			'rules' => 'required|numeric',
			'errors' => [
				'required' => 'Garansi wajib di isi',
				'numeric' => 'Garansi harus berupa angka',
			],
		],
		'nama_penerima'=> [
			'rules' => 'required|alpha_space',
			'errors' => [
				'required' => 'Nama Penerima wajib di isi',
				'alpha_space' => 'Nama Penerima harus berupa alfabetic',
			],
		],
		'alamat_penerima'=> [
			'rules' => 'required',
			'errors' => [
				'required' => 'Alamat Penerima wajib di isi',
			],
		],
		'pembayaran_pembeli' => [
			'rules' => 'required|numeric',
			'errors' => [
				'required' => 'Pembayaran wajib di isi',
				'numeric' => 'Pembayaran harus berupa angka',
			],
		],
	];
}
