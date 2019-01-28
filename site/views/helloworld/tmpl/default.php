<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

//use Joomla\Registry\Registry;

$array = $this->message;
$user = JFactory::getUser();

echo "<h2>" . JText::_('COM_AJUPMANAGER_HELLO') . " " . $user->name . "</h2>";
echo "<h3>" . JText::_('COM_AJUPMANAGER_ORDERSHEAD') . "</h3><br/>";

?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"><?php echo JText::_('COM_AJUPMANAGER_ORDERID') ?></th>
      <th scope="col"><?php echo JText::_('COM_AJUPMANAGER_STATUS') ?></th>
      <th scope="col"><?php echo JText::_('COM_AJUPMANAGER_FILE') ?></th>
      <th scope="col"><?php echo JText::_('COM_AJUPMANAGER_DATE') ?></th>
        <th scope="col"><?php echo JText::_('COM_AJUPMANAGER_TIME') ?></th>
    </tr>
  </thead>
  <tbody>
 <?php
  for($i = 0; $i < sizeof($array); $i++) {
  ?>    
    <tr>
      <th scope="row"><?php echo $array[$i]['id']; ?></th>
        <?php if ($array[$i]['filestatus'] == 'התקבל') {?>
            <td><span style="color:#f57070;"><?php echo $array[$i]['filestatus'];  ?></span></td>
        <?php }
            else if ($array[$i]['filestatus'] == 'טופל') {?>
            <td><span style="color:#2f96b0;"><?php echo $array[$i]['filestatus'];  ?></span></td>
        <?php }
            else if ($array[$i]['filestatus'] == 'נשלח') {?>
            <td><span style="color:#0abc75;"><?php echo $array[$i]['filestatus'];  ?></span></td>
        <?php }?>
      <td><a href="<?php
          $imageURL = JUri::base().json_decode($array[$i]['image'], true)["image"];
          echo $imageURL;
          ?>"><?php echo JText::_('COM_AJUPMANAGER_LINKEDFILE') ?></a></td>
      <td><?php echo substr($array[$i]['created'], 0, 10); ?></td>
        <td><?php echo substr($array[$i]['created'], 10, 6); ?></td>
    </tr>

<?php
	}
 ?>

  </tbody>
</table>
<?php echo "<br/><a href=\"index.php?option=com_helloworld&view=form\" class=\"sppb-btn  sppb-btn-custom sppb-btn-lg sppb-btn-block sppb-btn-rounded\" style=\"background: #389ab3;\"><i class=\"fa fa-check\"></i> " . JText::_('COM_AJUPMANAGER_ORDERSBUTTON') . "</a>";  ?>
