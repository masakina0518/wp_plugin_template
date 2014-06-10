<?php

class Sample_PluginAutoload {

    /**
     * 読み込む phpファイル を格納する配列
     */
    private $php_files = array();

    /**
     * ディレクトリーに含まれる phpファイルを走査
     * -> 読み込みたくないファイルはファイル名の最初に"_"を付ける
     */
    private function read_dir( $path ) {
        if ( !is_dir( $path ) )
            return;
        $dir = array();
        $entries = scandir( $path );
        foreach ( $entries as $entry ) {
            if ( '.' == $entry || '..' == $entry || '_' == $entry[0] )
                continue;
            $result = $path . $entry;
            if ( is_dir( $result ) )
                $dir[] = $this->read_dir( $result . '/' );
            elseif ( '.php' === strtolower( substr( $result, -4 ) ) )
                $dir[] = $result;
        }
        /**
         * $dir は配列が入れ子になっていたりするので別関数で展開、$php_files に格納する
         */
        $this->set_php_files( $dir );
    }

    private function set_php_files( $dir ) {
        if ( !empty( $dir ) ) {
            foreach ( $dir as $var ) {
                if ( is_array( $var ) )
                    $this->set_php_files( $var );
                elseif ( is_file( $var ) )
                    $this->php_files[] = $var;
            }
        }
    }

    /**
     * 初期化 - $php_filesに格納された phpファイルを require_onceする
     */
    public function init( $path ) {
        $this->read_dir( $path );
        if ( !empty( $this->php_files ) ) {
            foreach ( $this->php_files as $file )
                require_once( $file );
        }
    }
}