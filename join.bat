@echo off
for /r "D:\DOSSIERS_ETUDIANTS\HVALENTIN\laragon2\laragon\www\MiniBlog" %%i in (*.php) do (
    echo Nom du fichier : %%~nxi >> CodesAjoutComment.txt
    for /f "delims=" %%j in ('type "%%i"') do (
        echo %%j >> CodesAjoutComment.txt
    )
)


