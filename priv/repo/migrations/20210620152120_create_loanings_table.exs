defmodule Biblo.Repo.Migrations.CreateBorrowingsTable do
  @moduledoc false

  use Ecto.Migration

  def change do
    create table :loanings do
      add :loaning_date, :date
      add :return_date, :date
      add :user_id, references(:users, type: :binary_id)
      add :copy_id, references(:copies, type: :binary_id)

      timestamps()
    end

    create unique_index(:loanings, [:copy_id])
  end
end
