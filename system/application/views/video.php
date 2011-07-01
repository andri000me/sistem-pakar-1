 <script type="text/javascript" src="<?php echo base_url()?>assets/js/files/enlargeit.js"></script>
      <script type="text/javascript">
        enl_brdsize = 20;
        enl_shadowintens = 20;
        enl_drgdrop = 0;
        enl_darksteps = 1;
        enl_buttonurl[0] = 'prev';
        enl_buttontxt[0] = 'Previous picture [left arrow key]';
        enl_buttonoff[0] = -180;
        enl_buttonurl[1] = 'next';
        enl_buttontxt[1] = 'Next picture [right arrow key]';
        enl_buttonoff[1] = -198;
        enl_buttonurl[2] = 'close';
        enl_buttontxt[2] = 'Close [Esc key]';
        enl_buttonoff[2] = -126;
      </script>
<h2><?php echo $title;?></h2>
<div id="gal">

    <table width="200" align="center" border="0">
      <tr>
        <td width="100" align="center">
          <img src="<?php echo base_url()?>uploads/video/thumb_testbild.jpg" onclick="enlarge(this);" longdesc="flv::<?php echo base_url()?>uploads/video/satu.flv::360::288" alt="rphMedia player" class="thumbnail" />
        </td>
        <td width="100" align="center">
          <img src="<?php echo base_url()?>uploads/video/thumb_testbild.jpg" onclick="enlarge(this);" longdesc="fl2::<?php echo base_url()?>uploads/video/dua.flv::360::288" alt="OS FLV player" class="thumbnail" />
        </td>
      </tr>
    </table>

<p id="pagination"><?php //echo $this->pagination->create_links(); ?></p>
</div>
