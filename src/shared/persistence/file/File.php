<?php
/**
 * File
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\Persistence\File;


class File {


    //---------------------------  Parámeters  ---------------------------

        /**
         * Parámeters
         *
         * @var Array
         * @access protected
         */
        protected ?Array $_parameters = [];

    //---------------------------  Parámeters  ---------------------------



    //---------------------------  Static functions  ---------------------------

        /**
         * Checks if the file exists
         * 
         * @param String $name
         * @return Bool
         */
        public static function sFileExists(String $name) {
            return file_exists($file);
        }


        /**
         * Is dir?
         * 
         * @param String $name
         * @return Bool
         */
        public static function sIsDir(String $name) {
            return is_dir($file);
        }


        /**
         * Is file?
         * 
         * @param String $name
         * @return Bool
         */
        public static function sIsFile(String $name) {
            return is_file($file);
        }


        /**
         * Is link?
         * 
         * @param String $name
         * @return Bool
         */
        public static function sIsLink(String $name) {
            return is_link($file);
        }

    //---------------------------  Static functions  ---------------------------



    //---------------------------  Overloading  ---------------------------

        /**
         * Constructor
         * 
         * @param ?Array $parameters
         */
        public function __construct(?Array $parameters = null) {
            $this->_parameters = $parameters;
        }

    //---------------------------  Overloading  ---------------------------



    /**
     * Checks if the file exists
     * 
     * @param String $name
     * @return Bool
     */
    public function file_exists(String $name) {
        return file_exists($name);
    }


    /**
     * Is dir?
     * 
     * @param String $name
     * @return Bool
     */
    public function is_dir(String $name) {
        return is_dir($name);
    }


    /**
     * Is file?
     * 
     * @param String $name
     * @return Bool
     */
    public function is_file(String $name) {
        return is_file($name);
    }


    /**
     * Is link?
     * 
     * @param String $name
     * @return Bool
     */
    public function is_link(String $name) {
        return is_link($name);
    }


    /**
     * File Size
     * 
     * @param String $name
     * @return Int
     */
    public function filesize(String $name) {
        return filesize($name);
    }


    /**
     * File Type
     * 
     * @param String $name
     * @return String
     */
    public function filetype(String $name) {
        return filetype($name);
    }


    /**
     * Rename
     * 
     * @param String $oldname
     * @param String $newname
     * @param resource $context
     * @return Bool
     */
    public function rename(String $oldname, String $newname, $context = null) {
        return rename($oldname, $newname, $context);
    }


    /**
     * copy
     * 
     * @param String $source
     * @param String $dest
     * @param resource $context
     * @return Bool
     */
    public function copy(String $source, String $dest, $context = null) {
        return copy($source, $dest, $context);
    }


    /**
     * Deletes
     * 
     * @param String $filename
     * @param resource $context
     * @return Bool
     */
    public function unlink(String $filename, $context = null) {
        return unlink($filename, $context);
    }


    /**
     * Deletes
     * 
     * @param String $filename
     * @param resource $context
     * @return Bool
     */
    public function delete(String $filename, $context = null) {
        return $this->unlink($filename, $context);
    }


    /**
     * Dada una cadena que contiene la ruta a un fichero o directorio, esta función devolverá la ruta del directorio padre que está a levels niveles del directorio actual.
     * 
     * Path relativo hasta el archivo sin incluir el archivo mismo
     * 
     * @param String $path
     * @param Int $levels
     * @return String
     */
    public function dirname(String $path, Int $levels = 1) {
        return dirname($path, $levels);
    }


    /**
     * Expande todos los enlaces simbólicos y resuelve las referencias de caracteres '/./', '/../' y '/' extra, en la ruta de entrada dada por path y devuelve el nombre de la ruta absoluta canonizado.
     * 
     * Path completo incluyendo el archivo
     * 
     * @param String $path
     * @return String
     */
    public function realpath(String $path) {
        return realpath($path);
    }


    /**
     * Devuelve información acerca de la ruta de un fichero
     * 
     * array(4) {
     * ["dirname"]=>
     * string(17) "nva_carpeta/2/2.1"
     * ["basename"]=>
     * string(8) "f2.1.txt"
     * ["extension"]=>
     * string(3) "txt"
     * ["filename"]=>
     * string(4) "f2.1"
     * }
     * 
     * @param String $path
     * @param Int $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME
     * @return Mixed
     */
    public function pathinfo(String $path, Int $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME) {
        return pathinfo($path, $options);
    }


    /**
     * Transfiere un fichero completo a un array
     * 
     * @param String $filename
     * @param Int $flags 
     * @param resource $context
     * @return Array
     */
    public function file(String $filename, Int $flags = 0, $context = null) {
        return file($filename, $flags, $context);
    }


    /**
     * Transmite un fichero completo a una cadena
     * 
     * @param String $filename
     * @param Bool $use_include_path = false
     * @param resource $context = 
     * @param Int $offset = 0
     * @param Int $maxlen = ?
     * @return String
     */
    public function file_get_contents(String $filename, Bool $use_include_path = false, $context = null, Int $offset = 0, Int $maxlen = null) {
        return file_get_contents($filename, $use_include_path, $context, $offset, $maxlen);
    }


    /**
     * Escribir datos en un fichero.
     * Esta función es idéntica que llamar a fopen(), fwrite() y fclose() sucesivamente para escribir información en un fichero
     * 
     * @param String $filename
     * @param Mixed $data
     * @param Int $flags = 0
     * @param resource $context = null
     * @return Int
     */
    public function file_put_contents(String $filename, Mixed $data, Int $flags = 0, $context = null) {
        return file_put_contents($filename, $data, $flags, $context);
    }


    /**
     * Abre un fichero o un URL
     * 
     * @param String $filename,
     * @param String $mode
     * @param Bool $use_include_path = false
     * @param resource $context = ?
     */
    public function fopen(String $filename, String $mode, Bool $use_include_path = false, $context = null) {
        return fopen($filename, $mode, $use_include_path, $context);
    }


    /**
     * Lectura de un fichero en modo binario seguro
     * 
     * @param resource $handle
     * @param Int $length
     * @return String
     */
    public function fread($handle, Int $length) {
        return fread($handle, $length);
    }


    /**
     * Escritura de un archivo en modo binario seguro
     * 
     * @param resource $handle
     * @param String $string
     * @param Int $length = ?
     * @return Int
     */
    public function fwrite($handle, String $string, Int $length = null) {
        return fwrite($handle, $string, $length);
    }


    /**
     * Escritura de un archivo en modo binario seguro
     * 
     * @param resource $handle
     * @param String $string
     * @param Int $length = ?
     * @return Int
     */
    public function fputs($handle, String $string, Int $length = null) {
        return $this->fwrite($handle, $string, $length);
    }


    /**
     * Cierra un puntero a un archivo abierto
     * 
     * @param resource $handle
     * @return Bool
     */
    public function fclose($handle) {
        return fclose($handle);
    }


    /**
     * Indica si el archivo fue subido mediante HTTP POST
     * 
     * is_uploaded_file($_FILES['archivo_usuario']['tmp_name'])
     * 
     * @param String $filename
     * @return Bool
     */
    public function is_uploaded_file(String $filename) {
        return is_uploaded_file($filename);
    }


    /**
     * Mueve un archivo subido a una nueva ubicación
     * 
     * @param String $filename
     * @param String $destination
     * @return Bool
     */
    public function move_uploaded_file(String $filename, String $destination) {
        return move_uploaded_file($filename, $destination);
    }


    /**
     * Realizar la salida de un fichero
     * 
     * @param String $filename
     * @param Bool $use_include_path
     * @param resource $context
     * @return Int
     */
    public function readfile(String $filename, Bool $use_include_path = false, $context = null) {
        return readfile($filename, $use_include_path, $context);
    }


    /**
     * Crea un directorio
     * 
     * @param String $pathname
     * @param Int $mode = 0777
     * @param Bool $recursive = false
     * @param resource $context = ?
     * @return Bool
     */
    public function mkdir(String $pathname, Int $mode = 0777, Bool $recursive = false, $context = null) {
        return mkdir($pathname, $mode, $recursive, $context);
    }


    /**
     * Abre un gestor de directorio
     * 
     * @param String $path
     * @param resource $context
     * @return resource
     */
    public function opendir(String $path, $context = null) {
        return opendir($path, $context);
    }


    /**
     * Regresar el gestor de directorio
     * 
     * @param resource $dir_handle
     */
    public function rewinddir($dir_handle) {
        rewinddir($dir_handle);
    }


    /**
     * Lee una entrada desde un gestor de directorio
     * 
     * @param resource $dir_handle
     * @return String
     */
    public function readdir($dir_handle) {
        return readdir($dir_handle);
    }


    /**
     * Cierra un gestor de directorio
     * 
     * @param resource $dir_handle
     */
    public function closedir($dir_handle) {
        closedir($dir_handle);
    }


    /**
     * Elimina un directorio
     * 
     * @param String $directory
     * @param resource $context
     * @return Bool
     */
    public function rmdir(String $directory, $context = null) {
        return rmdir($directory, $context);
    }


    /**
     * Indica si un fichero existe y es legible
     * 
     * @param String $filename
     * @return Bool
     */
    public function is_readable(String $filename) {
        return is_readable($filename);
    }


    /**
     * Returns the children
     * 
     * @param String $directory
     * @return Array
     */
    public function getChildren(String $directory) {
        if ( $this->is_dir($directory) ) {
            if ( $dir = $this->opendir($directory) ) {
                $lastChar = $directory[strlen($directory)-1];
                if ( $lastChar != DIRECTORY_SEPARATOR ) {
                    $directory .= DIRECTORY_SEPARATOR;
                }
                $salida = [];
                while ( $archivo = $this->readdir($dir) ) {
                    if ( $archivo != '.' && $archivo != '..' ) {
                        $salida[] = $directory . $archivo;
                    }
                }

                $this->closedir($dir);

                return $salida;
            }
        }

        return false;
    }


    /**
     * Copy a file or directory
     * 
     * @param String $source
     * @param String $dest
     * @param resource $context
     * @return Bool
     */
    public function copyFile(String $source, String $dest, $context = null) {
        if ( $this->is_file($source) ) {
            return $this->copy($source, $dest, $context);
        }

        else {
            if ( !$this->is_dir($dest) ) {
                if ( !$this->mkdir($dest) ) {
                    echo "No se pudo crear la carpeta $dest<br>";
                    return false;
                }
            }

            if ( $dir = $this->opendir($source, $context) ) {
                while ( $archivo = $this->readdir($dir) ) {
                    if ( $archivo != '.' && $archivo != '..' ) {
                        if ( $this->is_file($source.'/'.$archivo) ) {
                            if ( !$this->copy($source.'/'.$archivo, $dest.'/'.$archivo) ) {
                                echo "No se pudo copiar el archivo '$source/$archivo' al destino '$dest/$archivo'<br>";
                                $this->closedir($dir);
                                return false;
                            }
                        }
                        
                        elseif ( $this->is_dir($source.'/'.$archivo) ) {
                            if ( !$this->copyFile($source.'/'.$archivo, $dest.'/'.$archivo) ) {
                                echo "No se pudo copiar la carpeta '$source/$archivo' al destino '$dest/$archivo'<br>";
                                $this->closedir($dir);
                                return false;
                            }
                        }
                    }
                }

                $this->closedir($dir);
                return true;
            }
        }

        return false;
    }


    /**
     * Deletes a file or directory
     * 
     * @param String $file
     * @return Bool
     */
    public function deleteFile($file) {
        //si es archivo
        if ( $this->is_file($file) ) {
            if ( !@$this->unlink($file) ) {
                return false;
            }
            return true;
        }
        
        //si es directorio
        elseif( $this->is_dir($file) ) {
            if ( $dir = $this->opendir($file) ) {
                while ( $archivo = $this->readdir($dir) ) {
                    if ( $archivo != '.' && $archivo != '..' ) {
                        if ( !$this->deleteFile($file.'/'.$archivo) ) {
                            $this->closedir($dir);
                            return false;
                        }
                    }
                }

                $this->closedir($dir);
                if ( !@$this->rmdir($file) ) {
                    return false;
                }
                return true;
            }
            else {
                return false;
            }
        }
        
        return false;
    }


    /**
     * Limpia un directorio
     * 
     * @param String $directory
     * @param resource $context
     * @return Bool
     */
    public function cleanDir(String $directory, $context = null) {
        if ( $this->is_dir($directory) ) {
            if ( $dir = $this->opendir($directory, $context) ) {
                while ( $archivo = $this->readdir($dir) ) {
                    if ( $archivo != '.' && $archivo != '..' ) {
                        if ( !$this->deleteFile($directory.'/'.$archivo) ) {
                            $this->closedir($dir);
                            return false;
                        }
                    }
                }
                $this->closedir($dir);
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

}