<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LimitationCalculatorCaseAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Answers For First Question START
        DB::table('limitation_calculator_case_answers')->truncate();
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 1,
            'answer' => '150. Appeal under the Code of Criminal Procedure, 1898 from a sentence of death passed by a Court of Session [or by a High Court in the exercise of its original Criminal Jurisdiction] ( Murder refrence or jail appeal )',
            'display_order' => 1
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 1,
            'answer' => '151. Appeal from a decree or order of [a High Court] in the exercise of its original jurisdiction.  ( Intra Court Appeal | ICA  )',
            'display_order' => 2
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 1,
            'answer' => '152. Appeal under the Code of Civil Procedure, 1908 to the Court of a District Judge.  ( Regular first Appeal | RFA )',
            'display_order' => 3
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 1,
            'answer' => '153. Appeal under the Code of Civil Procedure, 1908 to High Court from an order of a Subordinate Court refusing leave to appeal to [Supreme Court].',
            'display_order' => 4
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 1,
            'answer' => '154. Appeal under the Code of Criminal Procedure 1898, to any Court other than a High Court.',
            'display_order' => 5
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 1,
            'answer' => '155. Appeal under the Code of Criminal Procedure 1898, to a High Court, except in the cases provided for by Article 150 and Article 157.',
            'display_order' => 6
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 1,
            'answer' => '156. Appeal under the Code of Civil Procedure, 1908, to a High Court, except in the cases provided for by Article 151 and Article 153. ( Regular first Appeal | RFA )',
            'display_order' => 7
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 1,
            'answer' => '157. Appeal under the Code of Criminal Procedure, 1898, from an order of acquittal.',
            'display_order' => 8
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 1,
            'answer' => 'Section 96 CPC First Appeal Order ( FA)',
            'display_order' => 9
        ]);

        //Answers For Second Question START
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '158. Under the Arbitration Act, 1940 (X of 1940), to set aside an award or to get an award remitted for reconsideration.',
            'display_order' => 10
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '159. For leave to appear and defend a suit under summary procedure referred to in section 128 or under Order XXXVII of the Code of Civil Procedure, 1908 (V of 1908).',
            'display_order' => 11
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '160. Application for an order under the same Code, to restore to the file an application for review rejected in consequence of the failure of the applicant to appear when the application was called on for hearing.',
            'display_order' => 12
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '161. Application for a review of judgment by a Court of Small Causes or by a Court invested with the jurisdiction of a Court of Small Causes when exercising that jurisdiction.',
            'display_order' => 13
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '162. Application for a review of judgment by a High Court in the exercise of its original jurisdiction.',
            'display_order' => 14
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '163. By a plaintiff, for an order to set aside a dismissal for default of appearance or for failure to pay costs of service of process or to furnish security for costs.',
            'display_order' => 15
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '164. By a defendant, for an order to set aside a decree passed ex parte.',
            'display_order' => 16
        ]);

        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '165. Under the Code of Civil Procedure, 1908 (V of 1908) by a person dispossessed of immoveable property and disputing the right of the decree holder or purchaser at a sale in execution of a decree to be put into possession.',
            'display_order' => 17
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '166. Under the same Code to set aside a sale in execution of a decree including any such application by a Judgment-debtor.',
            'display_order' => 18
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '167.Complaining of resistance or obstruction to delivery of possession of immoveable property decreed or sold in execution of a decree.',
            'display_order' => 19
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '168. For the readmission of an application dismissed for want of prosecution.',
            'display_order' => 20
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '169. For the re-hearing of an application heard ex parte.',
            'display_order' => 21
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '170. For leave to application as a pauper.',
            'display_order' => 22
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '171. Under the Code of Civil Procedure, 1908 (V of 1908), by the legal representative of a deceased plaintiff or defendant for setting aside an order or Judgment made or pronounced in his absence.',
            'display_order' => 23
        ]);

        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '172. Under the same Code by the assignee or the receiver of an insolvent plaintiff or appellant for an order to set aside the dismissal of a suit or an application.',
            'display_order' => 24
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '173. For a review of judgment except in the cases provided for by article 161 and article 162.',
            'display_order' => 25
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '174. For the issue of a notice under the same Code, to show cause why any payment made out of Court of any money payable under a decree or any adjustment of the decree should not be recorded as certified.',
            'display_order' => 26
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '175. For payment of the amount of a decree by installments.',
            'display_order' => 27
        ]);

        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '176. Under the same Code to have the legal representative of a deceased plaintiff or of a deceased appellant made a party.',
            'display_order' => 28
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '177. Under the same Code to have the legal representative of a deceased defendant or of a deceased respondent made a party.',
            'display_order' => 29
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '178. Under the Arbitration Act, 1940 (X of 1940), for the filling in Court of an award.',
            'display_order' => 30
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '179. By a person desiring to application under the Code of Civil Procedure, 1908 (V of 1908) to the Supreme Court for leave to application.',
            'display_order' => 31
        ]);

        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '180. By a purchaser of immoveable property at a sale in execution of a decree for delivery of possession.',
            'display_order' => 32
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '181. Applications for which no period of limitation is provided elsewhere in this schedule or by section 48 of the Code of Civil Procedure, 1908 ( V of 1908).',
            'display_order' => 33
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 2,
            'answer' => '182. To enforce a judgment, decree or order of any High Court in the exercise of its ordinary original civil jurisdiction, or an order of the supreme Court.',
            'display_order' => 34
        ]);

        //Answers For Third Question START
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 3,
            'answer' => '161. Application for a review of judgment by a Court of Small Causes or by a Court invested with the jurisdiction of a Court of Small Causes when exercising that jurisdiction.',
            'display_order' => 35
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 3,
            'answer' => '162. Application for a review of judgment by a High Court in the exercise of its original jurisdiction.',
            'display_order' => 36
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 3,
            'answer' => '173. For a review of judgment except in the cases provided for by article 161 and article 162.',
            'display_order' => 37
        ]);

        //Answers For Fourth Question START
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 4,
            'answer' => 'When you applied for revision?',
            'display_order' => 38
        ]);

        //Answers For Fifth Question START
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '1. To contest an award of the Board of Revenue Under the Waste Lands (Claims) Act, 1863 (XXII of 1863).',
            'display_order' => 39
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '2. For compensation for doing or for omitting to do an act alleged to be in pursuance of any enactment in force for the time being in Pakistan.',
            'display_order' => 40
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '3. Under the Specific Relief Act, 1877 (I of 1877), section 9, to recover possession of immoveable property.',
            'display_order' => 41
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '5. Under the summary procedure referred to in section 128 of the Code of Civil Procedure, 1908 (V of 1908) where the provision of such summary procedure does not exclude the ordinary procedure in such suits.',
            'display_order' => 42
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '6. Upon a Statute, Act, Regulation or Byelaw, for a penalty or forfeiture.',
            'display_order' => 43
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '7. For the wages of a household servant, artisan or labourer',
            'display_order' => 44
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '8. For the price of food or drink sold by the keeper of a hotel, tavern or lodging house.',
            'display_order' => 45
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '9. For the price of lodging.',
            'display_order' => 46
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '10. To enforce a right of preemption whether the right is founded on law, or general usage, or on special contract.',
            'display_order' => 47
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '11. By a person, against whom any of the following orders has been made to establish the right which he claims to the property comprised in the order: Order under the Code of Civil Procedure, 1908 (V of 1908), on a claim preferred to, or an objection made to the attachment of, property attached in execution of a decree;',
            'display_order' => 48
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '11A. By a person against whom an order has been made under the Code of Civil Procedure, 1908 (V of 1908), upon an application by the holder of a decree for the possession of immoveable property or by the purchaser of such property sold in execution of a decree complaining of resistance or obstruction to the delivery of possession thereof, or upon an application by any person dispossessed of such property in the delivery of possession thereof to the decree-holder or purchaser, to establish the right which he claims to the present possession of the property comprised in the order.',
            'display_order' => 49
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '12.',
            'display_order' => 50
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '13. To alter or set aside a decision or order of a Civil Court in any proceeding other than a suit.',
            'display_order' => 51
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '14. To set aside any act or order of an officer of Government in his official capacity, not herein otherwise expressly provided for.',
            'display_order' => 52
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '15. Against Government to set aside any attachment, lease or transfer of immoveable property by the revenueauthorities for arrears of Government revenue.',
            'display_order' => 53
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '16. Against Government to recover money paid under protest in satisfaction of a claim made by the revenue authorities on account of arrears of revenue or on account of demands recoverable as such arrears.',
            'display_order' => 54
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '17. Against Government for compensation for land acquired for public purposes.',
            'display_order' => 55
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '18. Like suit for compensation when the acquisition is not completed.',
            'display_order' => 56
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '19. For compensation for false imprisonment.',
            'display_order' => 57
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '20. By executors, administrators or representative under the Legal Representatives’ Suits Act, 1855 (XII of 1855).',
            'display_order' => 58
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '21. By executors, administrators or representatives under the Fatal Accidents Act, 1855 (XIII of 1855).',
            'display_order' => 59
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '22. For compensation for any other injury to the person.',
            'display_order' => 60
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '23. For compensation for a malicious prosecution.',
            'display_order' => 61
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '24. For compensation for libel.',
            'display_order' => 62
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '25. For compensation for slander.',
            'display_order' => 63
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '26. For compensation for loss of service occasioned by the seduction of the plaintiff’s servant or daughter.',
            'display_order' => 64
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '27. For compensation for inducing a person to break a contract with the plaintiff.',
            'display_order' => 65
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '28. For compensation for and illegal, irregular or excessive distress.',
            'display_order' => 66
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '29. For compensation for wrongful seizure for moveable property under legal process.',
            'display_order' => 67
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '30. Against a carrier for compensation for losing or injuring goods.',
            'display_order' => 68
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '31. Against a carrier for compensation for non delivery of, or delay in delivering, goods.',
            'display_order' => 69
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '32. Against one who having a right to use property for specific purposes, perverts it to other purposes.',
            'display_order' => 70
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '33. Under the Legal Representatives’ Suits Act, 1855 (XII of 1855), against an executor.',
            'display_order' => 71
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '34. Under the same Act against an administrator.',
            'display_order' => 72
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '35. Under the same Act against any other representative.',
            'display_order' => 73
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '36. For compensation for any malfeasance, misfeasance or nonfeasance independent of contract and not herein specially provided for.',
            'display_order' => 74
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '37. For compensation for obstructing a way or a watercourse.',
            'display_order' => 75
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '38. For compensation for diverting a water course.',
            'display_order' => 76
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '39. For compensation for trespass upon immoveable property.',
            'display_order' => 77
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '40. For compensation for infringing copyright or any other exclusive privilege.',
            'display_order' => 78
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '41. To restrain waste.',
            'display_order' => 79
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '42. For compensation for injury caused by an injunction wrongfully obtained.',
            'display_order' => 80
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '43. Under the Succession Act, 1925 (XXX of 1925), section 360 or section 361, to compel a refund by a person to whom an executor or administrator has paid a legacy or distributed assets.',
            'display_order' => 81
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '44. By a ward who has attained majority, to set aside a transfer or property by his guardian.',
            'display_order' => 82
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '47. By any person bound by an order respecting the possession of immoveable property made under the Code of Criminal Procedure, 1898 (V of 1898), or by any one claiming under such person, to recover the property comprised in such order.',
            'display_order' => 83
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '48. For specific moveable property lost or acquired by theft, or dishonest misappropriation or conversion, or for compensation for wrongfully taking or detaining the same. ',
            'display_order' => 84
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '48A. To recover moveable property conveyed or bequeathed in trust, deposited or pawned, and afterwards bought from the trustee, depositary or pawnee for a valuable consideration. ',
            'display_order' => 85
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '48B. To set aside sale of moveable property comprised in a Hindu, Muhammadan or Buddhist religious or charitable endowment, made by a manager thereof for a valuable consideration.   ',
            'display_order' => 87
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '49. For other specific moveable property, or for compensation for wrongfully taking or injuring or wrongfully detaining the same.    ',
            'display_order' => 88
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '50. For the hired of animals, vehicles, boats or household furniture.   ',
            'display_order' => 89
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '51. For the balance of money advanced in payment of goods to be delivered.   ',
            'display_order' => 90
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '52. For the price of goods sold and delivered, where no fixed period of credit is agreed upon.  ',
            'display_order' => 91
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '53. For the price of goods sold and delivered to be paid for after the expiry of a fixed period of credit.  ',
            'display_order' => 92
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '54. For the price of goods sold and delivered to be paid for by a bill of exchange, no such bill being given. ',
            'display_order' => 93
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '55. For the price of trees or growing crops sold by the plaintiff to the defendant where no fixed period of credit is agreed upon.  ',
            'display_order' => 94
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '56. For the price of work done by the plaintiff for the defendant at his request, where no time has been fixed or payment.   ',
            'display_order' => 95
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '57. For money payable for money lent.    ',
            'display_order' => 96
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '58. Like suit when the lender has given a cheque for the money.   ',
            'display_order' => 97
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '59. For money lent under an agreement that it shall be payable on demand.   ',
            'display_order' => 98
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '60. For money deposited under an agreement that it shall be payable on demand, including money of a customer in the hands of his banker so payable.  ',
            'display_order' => 99
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '61. For money payable to the plaintiff for money paid for the defendant.  ',
            'display_order' => 100
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '62. For money payable by the defendant to the plaintiff for money received by the defendant for the plaintiff’s use.  ',
            'display_order' => 101
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '63. For money payable for interest upon money due from the defendant to the plaintiff.  ',
            'display_order' => 102
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '64. For money payable to the plaintiff for money found to be due from the defendant to the plaintiff on accounts stated between them.  ',
            'display_order' => 103
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '64 A. Under Order XXXVII of the Code of Civil Procedure.    ',
            'display_order' => 104
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '65. For compensation for breach of a promise to do anything at a specified time, or upon the happening of a specified contingency.   ',
            'display_order' => 105
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '66. On a single bond, where a day is specified for payment.   ',
            'display_order' => 106
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '67. On a single bond, where no such day is specified.   ',
            'display_order' => 107
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '68. On a bond subject to a condition.  ',
            'display_order' => 108
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '69. On a bill of exchange or promissory note payable at a fixed time after date.  ',
            'display_order' => 109
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '70. On a bill of exchange payable at sight or after sight, but not at a fixed time. ',
            'display_order' => 110
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '71. On a bill of exchange accepted payable at a particular place.  ',
            'display_order' => 111
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '72. On a bill of exchange or promissory note payable at a fixed time after sight or after demand.   ',
            'display_order' => 112
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '73. On a bill of exchange or promissory note payable on demand and not accompanied by any writing restraining or postponing the right to sue.    ',
            'display_order' => 113
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '74. On a promissory note or bond payable by instalments.   ',
            'display_order' => 114
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '75. On a promissory note or bond payable by instalments, which provides that if default be made in payment of one or more instalments, the whole shall be due.   ',
            'display_order' => 115
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '76. On a promissory note given by the maker to a third person to be delivered to the payee after a certain event should happen.  ',
            'display_order' => 116
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '77. On a dishonoured foreign bill where protest has been made and notice give.  ',
            'display_order' => 117
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '78. By the payee against the drawer of a bill of exchange which has been dishonoured by non-acceptance. ',
            'display_order' => 118
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '79. By the acceptor of an accommodation – bill against the drawer.  ',
            'display_order' => 119
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '80. Suit on a bill of exchange, promissory note or bond not herein expressly provided for   ',
            'display_order' => 120
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '81. By a surety against .. the principal debtor.    ',
            'display_order' => 121
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '82. By a surety against a cosurety.   ',
            'display_order' => 122
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '83. Upon any other contract to indemnify.   ',
            'display_order' => 123
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '84. By an attorney or vakil for his cost of a suit or a particular business, there being no express agreement as to the time when such costs are to be paid.  ',
            'display_order' => 124
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '85. For the balance due on a mutual, open and current account, where there have been reciprocal demands between the parties.  ',
            'display_order' => 125
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '86A. On a policy of insurance when the sum insured in payable after proof of the death has been given to or received by the insurers. ',
            'display_order' => 126
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '86B. On a policy of insurance when the sum insured is payable after proof of the loss has been given to or received by the insurers.  ',
            'display_order' => 127
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '87. By the assured to recover premia paid under a policy voidable at the election of the insurers.  ',
            'display_order' => 128
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '88.  Against a factor for an account.  ',
            'display_order' => 129
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '89. By a principal against his agent for moveable property received by the latter and not accounted for.    ',
            'display_order' => 130
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '90. Other suits by principals against agents for neglect or misconduct.   ',
            'display_order' => 131
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '91. To cancel or set aside an instrument not otherwise provided for.   ',
            'display_order' => 132
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '92. To declare the forgery of an instrument issued or registered.  ',
            'display_order' => 133
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '93. To declare the forgery of an instrument attempted to be enforced against the plaintiff.  ',
            'display_order' => 134
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '94. For property which the plaintiff has conveyed while insane. ',
            'display_order' => 135
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '95. To set aside a decree obtained by fraud, or for other relief on the ground of fraud. ',
            'display_order' => 136
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '96. For relief on the ground of mistake.  ',
            'display_order' => 137
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '97. For money paid upon an existing consideration which afterwards fails.   ',
            'display_order' => 138
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '98. To make good out of the general estate of a deceased trustee the loss occasioned by a breach of trust.   ',
            'display_order' => 139
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '99. For contribution by a party who has paid the whole or more than his share of the amount due under a joint decree, or by a sharer in a joint estate who has paid the whole or more than his share of the amount of revenue due from himself and his co-sharers.   ',
            'display_order' => 140
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '100. By a co-trustee to enforce against the estate of a deceased trustee a claim for contribution.   ',
            'display_order' => 141
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '101. For a seaman’s wages.  ',
            'display_order' => 142
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '102. For wages not other wise expressly provided for by this schedule. ',
            'display_order' => 143
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '103. By a Muslim for exigible dower (mu’ ajjal).  ',
            'display_order' => 144
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '104. By a Muslim for deferred dower (mu’wajjal).   ',
            'display_order' => 145
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '105. By a mortgagor after the mortgage has been satisfied, to recover surplus collections received by the mortgagee.  ',
            'display_order' => 146
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '106. For an account and a share of the profits of a dissolved partnership.',
            'display_order' => 147
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '107. By the manager of a joint estate of an undivided family for contribution, in respect of a payment made by him on account of the estate ',
            'display_order' => 148
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '108. By a lessor for the value of trees cut down by his lessee contrary to the terms of the lease.  ',
            'display_order' => 149
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '109. For the profits of immoveable property belonging to the plaintiff which have been wrongfully received by the defendant. ',
            'display_order' => 150
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '110. For arrears of rent.  ',
            'display_order' => 151
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '111. By a vendor of immoveable property for personal payment of unpaid purchase money.   ',
            'display_order' => 152
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '112. For a call by a company registered under any Statute or Act.    ',
            'display_order' => 153
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '113. For specific performance of a contract   ',
            'display_order' => 154
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '114. For the rescission of a contract.  ',
            'display_order' => 155
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '115. For compensation for the breach of any contract, express or implied, not in writing registered and not herein specially provided for. ',
            'display_order' => 156
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '116. For compensation for the breach of a contract in writing registered.  ',
            'display_order' => 157
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '117. Upon a foreign judgment as defined in the Code of Civil Procedure, 1908 (V of 1908). ',
            'display_order' => 158
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '118. To obtain a declaration that an alleged adoption is invalid, or never, in fact, took place.  ',
            'display_order' => 159
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '119. To obtain a declaration that an adoption is valid.   ',
            'display_order' => 160
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '120  Suit for which no period of limitation is provided elsewhere in this schedule  ',
            'display_order' => 161
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '121. To avoid incumbrances or under-tenures in an entire estate sold for arrears of Government revenue, or in a patni taluq or other saleable tenure sold for arrears of rent.   ',
            'display_order' => 162
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '122. Upon a judgment obtained in Pakistan, or a recognizance.  ',
            'display_order' => 163
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '123. For a legacy or for a share of a residue bequeathed by a testator, or for a distributive share of the property of an intestate ',
            'display_order' => 164
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '124. For possession of an hereditary office.  ',
            'display_order' => 165
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '125. Suit during the life of a Hindu or Muslim female by a Hindu or Muslim who, if the female died at the date of instituting the suit, would be entitled to the possession of land, to have an alienation of such land made by the female declared to be void except for here life or until her remarriage.   ',
            'display_order' => 166
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '126. By a Hindu governed by the law of the Mitakshara to set aside his father’s alienation of ancestral property.   ',
            'display_order' => 167
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '127. By a person excluded from joint family property to enforce a right to share therein.   ',
            'display_order' => 168
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '128. By a Hindu for arrears of maintenance.  ',
            'display_order' => 169
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '129. By a Hindu for a declaration of his right to maintenance. ',
            'display_order' => 170
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '130. For the resumption or assessment of rent-free land. ',
            'display_order' => 171
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '131. To establish a periodically recurring right.  ',
            'display_order' => 172
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '132. To enforce payment of money charged upon immoveable property.Explanation.—For the purposes of this article the allowance and fees respectively called malikana and haqqs, and  ',
            'display_order' => 173
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '134. To recover possession of immoveable property conveyed or bequeathed in trust or mortgaged and afterwards transferred by the trustee or mortgagee for a valuable consideration.  ',
            'display_order' => 174
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '134A. To set aside a transfer of immoveable property comprised in a Hindu, Muslim or Buddhist religious or charitable endowment, made by a manager thereof for a valuable consideration.    ',
            'display_order' => 175
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '134B. By the manager of a Hindu, Muslim or Buddhist religious or charitable endowment to recover possession of immoveable property comprised in the endowment which has been transferred by a previous manager for valuable consideration.   ',
            'display_order' => 176
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '134C. By the manager of a Hindu, Muslim or Buddhist religious or charitable endowment to recover possession of moveable property comprised in the endowment which has been sold by a previous manager for a valuable consideration.  ',
            'display_order' => 177
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '135. Suit instituted in a Court other than a High Court by a mortgage for possession of immoveable property mortgaged.   ',
            'display_order' => 178
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '136. By a purchaser at a private sale for possession of immoveable property sold when the vendor was out of possession at the date of the sale.  ',
            'display_order' => 179
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '137. Like suit by a purchaser at a sale in execution of a decree when the judgment debtor was out of possession at the date of the sale. ',
            'display_order' => 180
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '138. Like suit by a purchaser at a sale in execution of a decree, when the judgment debtor was in possession at the date of the sale.  ',
            'display_order' => 181
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '139. By a landlord to recover possession from a tenant.  ',
            'display_order' => 182
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '140. By a remainderman, a reversioner (other than a landlord) or a devisee, for possession of immoveable property.  ',
            'display_order' => 183
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '141. Like suits by a Hindu or Muslim entitled to the possession of immoveable property on the death of a Hindu or Muslim female  ',
            'display_order' => 184
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '142. For possession of immoveable property when the plaintiff while in possession of the property, has been dispossessed or has discontinued the possession. ',
            'display_order' => 185
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '143. Like suit, when the plaintiff has become entitled by reason of any forfeiture or breach of condition. ',
            'display_order' => 186
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '145. Against a depositary or pawnee to recover moveable property deposited or pawned. ',
            'display_order' => 187
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '146.  Before a High Court in the exercise of its ordinary original civil jurisdiction by a mortgagee to recover from the mortgage the possession of immoveable property mortgaged. ',
            'display_order' => 188
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '146A. By or on behalf of any local authority for possession of any public street or road or any part thereof from which it has been dispossessed or of which it has discontinued the possession.  ',
            'display_order' => 189
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '147. By a mortgage for foreclosure or sale.',
            'display_order' => 190
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '148. Against a mortgagee to redeem or to recover possession of immoveable property mortgaged. ',
            'display_order' => 191
        ]);
        DB::table('limitation_calculator_case_answers')->insert([
            'limitation_calculator_question_id' => 5,
            'answer' => '149. Any suit by or on behalf of the Federal Government or any Provincial Government except a suit before the Supreme Court in the exercise of its original jurisdiction. ',
            'display_order' => 192
        ]);
    }
}
