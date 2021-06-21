defmodule Biblo.Loaning do
  @moduledoc """
    Biblo.Loaning
  """

  use Ecto.Schema

  import Ecto.Changeset
  alias Biblo.Copy
  alias Biblo.User

  @primary_key{:id, :binary_id, autogenerate: true}
  @required_params [:loaning_date, :return_date, :user, :copy]

  schema "loanings" do
    field :loaning_date, :date
    field :return_date, :date
    belongs_to :user, User
    belongs_to :copy, Copy

    timestamps()
  end

  def changeset(params) do
    %__MODULE__{}
    |> cast(params, @required_params)
    |> validate_required(@required_params)
  end
end
