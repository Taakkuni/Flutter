import 'package:flutter/material.dart';

void main() {
  runApp(const MainApp());
}

class MainApp extends StatelessWidget {
  const MainApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: LoginPage(),
    );
  }
}

class LoginPage extends StatelessWidget {
  final TextEditingController _usernameController = TextEditingController();
  final TextEditingController _passwordController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Login'),
      ),
      body: Padding(
        padding: const EdgeInsets.all(20.0),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: <Widget>[
            TextFormField(
              controller: _usernameController,
              decoration: const InputDecoration(labelText: 'Username'),
            ),
            TextFormField(
              controller: _passwordController,
              obscureText: true,
              decoration: const InputDecoration(labelText: 'Password'),
            ),
            const SizedBox(height: 20),
            ElevatedButton(
              onPressed: () {
                final String username = _usernameController.text;
                final String password = _passwordController.text;

                if (username == 'mahasiswa' && password == '123') {
                  Navigator.push(
                    context,
                    MaterialPageRoute(builder: (context) => AbsenPage()),
                  );
                } else {
                  ScaffoldMessenger.of(context).showSnackBar(
                    const SnackBar(content: Text('Login gagal')),
                  );
                }
              },
              child: const Text('Login'),
            ),
          ],
        ),
      ),
    );
  }
}

class AbsenPage extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Absensi'),
      ),
      body: Center(
        child: ElevatedButton(
          onPressed: () {
            showDialog(
              context: context,
              builder: (BuildContext context) {
                return AlertDialog(
                  title: const Text('Absensi Berhasil'),
                  actions: <Widget>[
                    TextButton(
                      onPressed: () {
                        Navigator.of(context).pop();
                      },
                      child: const Text('OK'),
                    ),
                  ],
                );
              },
            );
          },
          child: const Text('Absen'),
        ),
      ),
      floatingActionButton: FloatingActionButton(
        onPressed: () {
          Navigator.push(
            context,
            MaterialPageRoute(builder: (context) => RiwayatAbsensiPage()),
          );
        },
        child: const Icon(Icons.history),
      ),
    );
  }
}

class RiwayatAbsensiPage extends StatelessWidget {
  // Data dummy untuk riwayat absensi
  final List<Map<String, String>> riwayatAbsensi = [
    {'nama': 'John Doe', 'nim': '123456', 'status': 'Sudah Absen'},
    {'nama': 'Jane Doe', 'nim': '789012', 'status': 'Sudah Absen'},
    // Tambahkan data riwayat absensi lainnya di sini sesuai kebutuhan
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Riwayat Absensi'),
      ),
      body: ListView.builder(
        itemCount: riwayatAbsensi.length,
        itemBuilder: (context, index) {
          return ListTile(
            title: Text(riwayatAbsensi[index]['nama']!),
            subtitle: Text('NIM: ${riwayatAbsensi[index]['nim']}'),
            trailing: Text(riwayatAbsensi[index]['status']!),
          );
        },
      ),
    );
  }
}
