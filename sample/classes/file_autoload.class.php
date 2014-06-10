<?php

class Sample_PluginAutoload {

    /**
     * �ǂݍ��� php�t�@�C�� ���i�[����z��
     */
    private $php_files = array();

    /**
     * �f�B���N�g���[�Ɋ܂܂�� php�t�@�C���𑖍�
     * -> �ǂݍ��݂����Ȃ��t�@�C���̓t�@�C�����̍ŏ���"_"��t����
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
         * $dir �͔z�񂪓���q�ɂȂ��Ă����肷��̂ŕʊ֐��œW�J�A$php_files �Ɋi�[����
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
     * ������ - $php_files�Ɋi�[���ꂽ php�t�@�C���� require_once����
     */
    public function init( $path ) {
        $this->read_dir( $path );
        if ( !empty( $this->php_files ) ) {
            foreach ( $this->php_files as $file )
                require_once( $file );
        }
    }
}