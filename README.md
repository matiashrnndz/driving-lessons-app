# driving-lessons-app

# Manual de instalación

Para poder completar la instalación de la aplicación, es necesario que se realicen los siguientes
pasos en e orden que aparecen a continuación:

1. Ejecutar la VM en VirtualBox.
2. Una vez iniciada la VM, se verá el IP en la pantalla principal, la llamaremos VM_IP de aquí en
adelante a modo de ejemplo.
3. Ir a un navegador web y escribir la URL: VM_IP:12322, esto le abrirá phpMyAdmin.
4. Acceder usando root root como usuario y contraseña.
5. Ir a la pestaña Import, ir a Choose File y seleccionar el dump de la base de datos adjunto.
6. Apretar Go, una vez finalizado, se verá que se cargó correctamente la base de datos.
7. Ir a un navegador web y escribir la URL: VM_IP:12320, esto le abrirá la línea de comandos.
8. En la línea de comandos, hacer log in como root root.
9. Escribir el comando: cd “../var/www/driving-lessons” y tocar Enter.
10. Escribir el comando: chmod -R 777 tmp/templates_c
11. Ejecutar Netbeans, ir a File, Open Project.., seleccionar el proyecto y apretar Open Project.
12. En Netbeans, botón derecho sobre el proyecto, seleccionar Run Configuration y cambiar el
IP que aprarece en Project URL (192.168.1.3) por VM_IP.
13. En el mismo menú, ir a Manage.. sobre Remote Connection, y cambiar Host Name
(192.168.1.3) por VM_IP y toque OK.
14. Apretar el botón derecho del mouse sobre Source Files y tocar Upload...
15. Seleccionar el checkbox de Check All, apretar Upload y poner Yes en el popup de seguridad
que aparece.
16. Apretar el botón Play para que se ejecute la aplicación Web.
