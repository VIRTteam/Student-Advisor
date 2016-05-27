<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function index()
    {

    }
    public function get_clan($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('clan');
            return $query->result_array()[0];
        }

        $query = $this->db->get_where('clan', array('idClan' => $id));
        return $query->row_array();
    }
    public function get_kurs($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('kurs');
            return $query->result_array()[0];
        }

        $query = $this->db->get_where('kurs', array('idKurs' => $id));
        return $query->row_array();
    }
    public function get_kurs_komentar($id = 1)
    {
        $query = $this->db->query("select p.*, k.* FROM komentar p inner join kurs k on p.idKurs = k.idkurs and p.idKom=?", array($id));
        return $query->row_array();
    }
    public function get_kurs_predavac($idKurs = 1)
    {
        $query = $this->db->query("select p.*, k.* FROM predavac p inner join predaje k on p.idPred = k.idPred and k.idKurs=? ORDER BY p.zvanje DESC", array($idKurs));
        return $query->result_array();
    }
    public function get_clan_komentar($id = 1)
    {
        $query = $this->db->query("select p.*, k.* FROM komentar p inner join clan k on p.idClan = k.idClan and p.idKom=?", array($id));
        return $query->row_array();
    }
    public function get_podkomentar($id = 1)
    {
        $query = $this->db->query("select p.*, k.* FROM podkomentar p inner join clan k on p.idClan = k.idClan and p.idKom=?", array($id));
        return $query->result_array();
    }
    public function get_Komentar_clan($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->query("select p.*, k.* FROM komentar p inner join kurs k on p.idKurs = k.idkurs");
            return $query->result_array();
        }

        $query = $this->db->query("select p.*, k.* FROM komentar p inner join kurs k on p.idKurs = k.idkurs and p.idClan=?", array($id));
        return $query->result_array();
    }
    public function get_Polozio_clan($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->query("select p.*, k.* FROM polozio p inner join kurs k on p.idKurs = k.idkurs");
            return $query->result_array();
        }

        $query = $this->db->query('select p.*, k.* FROM polozio p inner join kurs k on p.idKurs = k.idkurs AND p.idClan=?',array($id));
        return $query->result_array();
    }
    public function get_Komentar_kurs($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->query("select p.*, k.* FROM komentar p inner join clan k on p.idClan = k.idClan");
            return $query->result_array();
        }

        $query = $this->db->query("select p.*, k.* FROM komentar p inner join clan k on p.idClan = k.idClan and p.idKurs=?", array($id));
        return $query->result_array();
    }
    public function get_Polozio_kurs($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->query("select p.*, k.* FROM polozio p inner join clan k on p.idClan = k.idClan");
            return $query->result_array();
        }

        $query = $this->db->query('select p.*, k.* FROM polozio p inner join clan k on p.idClan = k.idClan AND p.idKurs=?',array($id));
        return $query->result_array();
    }
}