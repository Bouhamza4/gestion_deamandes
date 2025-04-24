<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bulletin de notes</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td><img src="{{ public_path('images/logo.png') }}" width="80"></td>
            <td align="center"><h2>المؤسسة العليا للتكوين</h2></td>
            <td align="right"><img src="{{ public_path('images/signature.png') }}" width="80"></td>
        </tr>
    </table>

    <hr>

    <p><strong>Nom de l'étudiant:</strong> {{ $etudiant->nom }}</p>
    <p><strong>Moyenne générale:</strong> {{ $moyenne }}</p>
    <h2>Bulletin de notes</h2>
    <p><strong>Nom de l'étudiant:</strong> {{ $etudiant->nom }}</p>
    <p><strong>Moyenne générale:</strong> {{ $moyenne }}</p>

    <table>
        <thead>
            <tr>
                <th>Module</th>
                <th>Note</th>
                <th>Semestre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notes as $note)
                <tr>
                    <td>{{ $note->course->nom }}</td>
                    <td>{{ $note->note }}</td>
                    <td>{{ $note->semestre ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
